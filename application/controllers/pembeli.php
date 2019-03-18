<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('pembeli_mdl','prf');
    }

    public function index()
	{
		$data['dataPembeli'] = $this->prf->getPembeli();
        $data['konten'] = 'v_pembeli';
        $this->load->view('template', $data);
    }
    
    public function tambahpembeli()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama pembeli', 'trim|required', array('required' => 'semua harus diisi'));
        $this->form_validation->set_rules('telp', 'telp', 'trim|required', array('required' => 'semua harus diisi'));
        $this->form_validation->set_rules('username', 'username', 'trim|required', array('required' => 'semua harus diisi'));
        $this->form_validation->set_rules('password', 'password', 'trim|required', array('required' => 'semua harus diisi'));

        if ($this->form_validation->run() == TRUE){
            $this->load->model('pembeli_mdl', 'pembeli');
            $masuk=$this->pembeli->masuk_db();
            if($masuk==true){
                $this->session->set_flashdata('pesan', 'sukses masuk');    
            }
            else{
                $this->session->set_flashdata('pesan', 'gagal masuk'); 
            }
            redirect(base_url('index.php/pembeli'),'refresh');
    } 
    else
    {
        $this->session->set_flashdata('pesan', validation_errors());
        redirect(base_url('index.php/pembeli'),'refresh');
    }
}

    public function getDetailpembeli($id_pembeli='')
    {
        $this->load->model('pembeli_mdl');
        $data_detail=$this->pembeli_mdl->detailpembeli($id_pembeli);
        echo json_encode($data_detail);
    }

    public function updatepembeli()
    {
        $this->form_validation->set_rules('nama_pembeli', 'Nama pembeli', 'trim|required');
        $this->form_validation->set_rules('telp', 'No Telp', 'trim|required');
        $this->form_validation->set_rules('username', 'Username', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->session->set_flashdata('pesan', validation_errors());
            redirect(base_url('index.php/pembeli'),'refresh');            
        } 
        else 
        {
            $this->load->model('pembeli_mdl');
            $proses_update=$this->pembeli_mdl->updatepembeli();
            if($proses_update){
                $this->session->set_flashdata('pesan', 'sukses update');             
            }
            else{
                $this->session->set_flashdata('pesan', 'gagal update');             
            }
            
            redirect(base_url('index.php/pembeli'),'refresh');
        }
    }

    public function deletePembeli($id_pembeli)
    {
        $this->load->model('pembeli_mdl');
        $prosesDelete = $this->pembeli_mdl->deletePembeli($id_pembeli);

        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan','Sukses Hapus Data');    
        } else {
            $this->session->set_flashdata('pesan','Gagal Hapus Data');
        }

        redirect(base_url('index.php/pembeli'),'refresh');

    }

}
/* End of file Pembeli.php */