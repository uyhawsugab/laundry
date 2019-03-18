<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
        $this->load->model('layanan_mdl','lyn');
    }

	public function index()
	{
		$data['dataLyn'] = $this->lyn->getLayanan();
        $data['konten'] = 'v_layanan';
        $this->load->view('template', $data);
	}

	public function tambahLayanan()
    {
    	$this->form_validation->set_rules('Kode', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('nama_layanan', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

        if($this->form_validation->run() == TRUE){

            $prosesAdd = $this->lyn->addLayanan();
            if($prosesAdd == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/layanan'),'refresh');
        }else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             redirect(base_url('index.php/layanan'),'refresh');
        }
    }

    public function getDetailLayanan($id_layanan)
    {
        $dataDetail = $this->lyn->detailLayanan($id_layanan);
        echo json_encode($dataDetail);
    }

    public function updateLayanan()
    {
    	$this->form_validation->set_rules('Kode', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('nama_layanan', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

       if ($this->form_validation->run() == TRUE) {

            $prosesUpdate = $this->lyn->updateLayanan();
            if($prosesUpdate == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/layanan'),'refresh');
    	    } else {
          		$this->session->set_flashdata('pesan',
            validation_errors());
            redirect(base_url('index.php/layanan'),'refresh');
       }
    }

    public function deleteLayanan($id_layanan)
    {
        $prosesDelete = $this->lyn->deleteLayanan($id_layanan);
        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan', 'Sukses');
        }else {
            $this->session->set_flashdata('pesan', 'Gagal');
        }
        redirect(base_url('index.php/layanan'),'refresh');
    }

}

/* End of file layanan.php */
/* Location: ./application/controllers/layanan.php */