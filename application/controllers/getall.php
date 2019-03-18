<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class getall extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('getall_mdl','gl');
        
    }
    

    public function index()
    {
        $data['konten'] = 'user/konten';

        $this->load->view('user/template', $data);
        
    }

    public function Pakaian()
    {
       $dataPkn = $this->gl->getPakaian();
       echo json_encode($dataPkn);
    }

}

/* End of file getall.php */
