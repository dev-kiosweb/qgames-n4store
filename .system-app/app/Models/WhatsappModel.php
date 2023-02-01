<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\M_Base;

class WhatsappModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'whatsapp';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['template', 'type', 'created_at', 'updated_at', 'deleted_at'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    
    
    public function sendWa($target = null, $data_wa = null, $type = null) 
    {
        $M_Base = new M_Base;

        $name = session('name') != null ? session('name') : 'Pelanggan Yth.' ;
        $order_id = $data_wa['order_id'];
        $product = $data_wa['product'];
        $price = $data_wa['price'];
        $status = $type;

        $template = $this->where('type', $type)->first();

        $message = str_replace("#status#", $status, str_replace("#price#", $price, str_replace('#product#', $product, str_replace("#orderid#", $order_id, str_replace("#name#", $name, $template['template'])))));
       
        // $curl = curl_init();
        // curl_setopt_array($curl, array(
        //     CURLOPT_URL => 'https://api.fonnte.com/send',
        //     CURLOPT_RETURNTRANSFER => true,
        //     CURLOPT_ENCODING => '',
        //     CURLOPT_MAXREDIRS => 10,
        //     CURLOPT_TIMEOUT => 0,
        //     CURLOPT_FOLLOWLOCATION => true,
        //     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        //     CURLOPT_CUSTOMREQUEST => 'POST',
        //     CURLOPT_POSTFIELDS => array(
        //         'target' => $target,
        //         'message' => $message,
        //         'countryCode' => '62', //optional
        //     ),
        //     CURLOPT_HTTPHEADER => [
        //         'Authorization:  ' . $M_Base->u_get('fonnte-token') . '' //change TOKEN to your actual token
        //     ],
        // ));

        // $response = curl_exec($curl);

        // curl_close($curl);
        // return $response;


        $postdata = http_build_query(
            array(
                'target' => $target,
                'message' => $message,
                'countryCode' => '62'
            )
        );

        $opts = array('http' =>
            array(
                'method'  => 'POST',
                'header'  => [ 'Authorization:  ' . $M_Base->u_get('fonnte-token'),  'Content-Type: application/x-www-form-urlencoded' ],
                'content' => $postdata
            )
        );

        $context  = stream_context_create($opts);
        $response = file_get_contents('https://api.fonnte.com/send', false, $context);

        return $response;
    }
}