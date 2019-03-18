<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class pakaian extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pakaian_mdl', 'pkn');
        
    }
    
    
    public function index()
    {
        $data['dataPkn'] = $this->pkn->getPakaian();

        $data['konten'] = 'v_pakaian';
        $this->load->view('template', $data);
        
    }

    public function tambahPakaian()
    {
        $this->form_validation->set_rules('jenis_pakaian', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('harga', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

        if($this->form_validation->run() == TRUE){

            $prosesAdd = $this->pkn->addPakaian();
            if($prosesAdd == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                // $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/pakaian'),'refresh');
        }else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             redirect(base_url('index.php/pakaian'),'refresh');
        }
    }

    public function getDetailPakaian($id_pakaian)
    {
        $dataDetail = $this->pkn->detailPakaian($id_pakaian);
        echo json_encode($dataDetail);
    }

    public function updatePakaian()
    {
        $this->form_validation->set_rules('jenis_pakaian', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('harga', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

       if ($this->form_validation->run() == TRUE) {

            $prosesUpdate = $this->pkn->updatePakaian();
            if($prosesUpdate == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                // $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/pakaian'),'refresh');
    	    } else {
          		$this->session->set_flashdata('pesan',
            validation_errors());
            redirect(base_url('index.php/pakaian'),'refresh');
       }
    }

    public function deletePakaian($id_pakaian)
    {
        $prosesDelete = $this->pkn->deletePakaian($id_pakaian);
        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan', 'Sukses');
        }else {
            $this->session->set_flashdata('pesan', 'Gagal');
        }
        redirect(base_url('index.php/pakaian'),'refresh');
    }

}

/* End of file pakaian.php */
