<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

use App\Models\M_Base;
use App\Models\WhatsappModel;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = ['my_helper', 'form'];

    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();

        $this->validation =  \Config\Services::validation();
        $this->db = \Config\Database::connect();
        $this->session = \Config\Services::session();
        $this->agent = $this->request->getUserAgent();

        $this->M_Base = new M_Base();
        $this->MWa = new WhatsappModel;
        $this->tripay_base = "https://tripay.co.id/api-sandbox/";

        $this->ip = $request->getIPAddress();
        
        $this->admin = false;

        if (session('email')) {
        	$admin = $this->M_Base->data_where('users', 'email', session('email'));
            // $admin = $this->M_Base->data_where('admin', 'username', $this->session->get('admin'));

            if (count($admin) == 1) {
                if ($admin[0]['status'] == 'On') {
                    $this->admin = true;
                }
            }
        }

        $this->users = false;

        if (session('email')) {
            $users = $this->M_Base->data_where('users', 'email', session('email'));

            if (count($users) == 1) {
                if ($users[0]['status'] == 'On') {
                    $this->users = $users[0];
                }
            }
        }

        $this->base_data = [
            'users' => $this->users,
            'admin' => $this->admin,
            'web' => [
                'title' => $this->M_Base->u_get('web-title'),
                'author' => $this->M_Base->u_get('web-author'),
                'logo' => $this->M_Base->u_get('web-logo'),
                'icon' => $this->M_Base->u_get('web-icon'),
                'keywords' => $this->M_Base->u_get('web-keywords'),
                'description' => $this->M_Base->u_get('web-description'),
            ],
            'menu_active' => 'Home',
        ];
    }
}
