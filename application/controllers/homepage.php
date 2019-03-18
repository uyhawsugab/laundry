<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class homepage extends CI_Controller {

    public function index()
    {
        $data['konten'] = 'content';
        $this->load->view('template',$data);
        
    }

}

/* End of file homepage.php */
