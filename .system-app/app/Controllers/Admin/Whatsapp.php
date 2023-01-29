<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Whatsapp extends BaseController {

    public function index() {

    	if ($this->base_data['users'] == false) {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}

    	if ($this->base_data['users']['level'] !== 'Admin') {
    		throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
    	}

    	$data = array_merge($this->base_data, [
    		'title' => 'Kelola Template Whatsapp',
            'whatsapp' => $this->M_Base->all_data('whatsapp'),
    	]);

        return view('Admin/Whatsapp/index', $data);
    }

    public function edit($id = null) {

        if ($this->base_data['users'] == false) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($this->base_data['users']['level'] !== 'Admin') {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }

        if ($id) {
            if (is_numeric($id)) {
                $data_edit = $this->M_Base->data_where('whatsapp', 'id', $id);

                if (count($data_edit) === 1) {

                    if ($this->request->getPost('tombol')) {
                        $data_post = [
                            'template' => $this->request->getPost('template'),
                        ];
                        $this->M_Base->data_update('whatsapp', $data_post, $id);

                        $this->session->setFlashdata('success', 'Template whatsapp berhasil disimpan');
                        return redirect()->to(str_replace('index.php/', '', site_url(uri_string())));
                    }

                    $data = array_merge($this->base_data, [
                        'title' => 'Edit Template Whatsapp',
                        'whatsapp' => $data_edit[0],
                    ]);

                    return view('Admin/Whatsapp/edit', $data);

                } else {
                    $this->session->setFlashdata('error', 'Data template whatsapp tidak ditemukan');
                    return redirect()->to(base_url() . '/admin/whatsapp');
                }
            } else {
                throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
            }
        } else {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
    }
}
