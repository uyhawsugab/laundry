<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('nota_mdl','nta');

        $this->load->model('pembeli_mdl','pmb');
    }

	public function index()
	{
        $data['dataNta'] = $this->nta->getnota();

        $data['dataPmbl'] = $this->pmb->getPembeli();
        
        $data['konten'] = 'v_nota';
        $this->load->view('template', $data);
	}

	public function tambahnota()
    {
        $this->form_validation->set_rules('id_pembeli', 'fieldlabel', 'trim|required',array('required' => 'Id Pembeli harus diisi'));
        $this->form_validation->set_rules('tgl', 'fieldlabel', 'trim|required',array('required' => 'Id Pembeli harus diisi'));
        $this->form_validation->set_rules('grandtotal', 'fieldlabel', 'trim|required',array('required' => 'Id Pembeli harus diisi'));

        if($this->form_validation->run() == TRUE){

            $prosesAdd = $this->nta->addnota();
            if($prosesAdd == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/nota'),'refresh');
        }else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             redirect(base_url('index.php/nota'),'refresh');
        }
    }

    public function getDetailnota($id_nota)
    {
        $dataDetail = $this->nta->detailnota($id_nota);
        echo json_encode($dataDetail);
    }

    public function updatenota()
    {
        $this->form_validation->set_rules('id_pembeli', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('tgl', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('grandtotal', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

       if ($this->form_validation->run() == TRUE) {

            $prosesUpdate = $this->nta->updatenota();
            if($prosesUpdate == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/nota'),'refresh');
    	    } else {
          		$this->session->set_flashdata('pesan',
            validation_errors());
            redirect(base_url('index.php/nota'),'refresh');
       }
    }

    public function deletenota($id_nota)
    {
        $prosesDelete = $this->nta->deletenota($id_nota);
        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan', 'Sukses');
        }else {
            $this->session->set_flashdata('pesan', 'Gagal');
        }
        redirect(base_url('index.php/nota'),'refresh');
    }

}

/* End of file nota.php */
/* Location: ./application/controllers/nota.php */