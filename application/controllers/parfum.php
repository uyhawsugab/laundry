<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parfum extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('parfum_mdl','prf');
    }

	public function index()
	{
		$data['dataPrf'] = $this->prf->getParfum();
        $data['konten'] = 'v_parfum';
        $this->load->view('template', $data);
	}

	public function tambahParfum()
    {
        $this->form_validation->set_rules('nama_parfum', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('harga', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

        if($this->form_validation->run() == TRUE){

            $prosesAdd = $this->prf->addParfum();
            if($prosesAdd == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                // $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/parfum'),'refresh');
        }else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             redirect(base_url('index.php/parfum'),'refresh');
        }
    }

    public function getDetailParfum($id_parfum)
    {
        $dataDetail = $this->prf->detailParfum($id_parfum);
        echo json_encode($dataDetail);
    }

    public function updateParfum()
    {
        $this->form_validation->set_rules('nama_parfum', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('harga', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

       if ($this->form_validation->run() == TRUE) {

            $prosesUpdate = $this->prf->updateParfum();
            if($prosesUpdate == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                // $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/parfum'),'refresh');
    	    } else {
          		$this->session->set_flashdata('pesan',
            validation_errors());
            redirect(base_url('index.php/parfum'),'refresh');
       }
    }

    public function deleteParfum($id_parfum)
    {
        $prosesDelete = $this->prf->deleteParfum($id_parfum);
        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan', 'Sukses');
        }else {
            $this->session->set_flashdata('pesan', 'Gagal');
        }
        redirect(base_url('index.php/parfum'),'refresh');
    }

}

/* End of file parfum.php */
/* Location: ./application/controllers/parfum.php */