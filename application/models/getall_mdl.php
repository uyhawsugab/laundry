<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class getall_mdl extends CI_Model {

    public function getPakaian()
    {
        $dataPkn = $this->db->get('pakaian')->result();

        return $dataPkn;
    }

}

/* End of file getall_mdl.php */
