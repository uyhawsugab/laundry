<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class homeuser extends CI_Controller {

    
    public function index()
    {


        $this->load->view('user/template', $data);
        
    }

}

/* End of file homeuser.php */
