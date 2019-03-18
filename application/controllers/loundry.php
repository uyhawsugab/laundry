<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class loundry extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('laundry_mdl','lnd');
        
    }
    


    public function index()
    {
        
        $data['dataLnd'] = $this->lnd->getLaundry();
        

        $data['konten'] = 'v_loundry';
        $this->load->view('template', $data);
        
    }
    public function tambahLaundry()
    {
        $this->form_validation->set_rules('kode', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('nama_laundry', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

        if($this->form_validation->run() == TRUE){

            $prosesAdd = $this->lnd->addLaundry();
            if($prosesAdd == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                $this->session->set_flashdata('pesan', 'Gagal');
            }
            redirect(base_url('index.php/loundry'),'refresh');
        }else {
            $this->session->set_flashdata('pesan',
             validation_errors());
             
             redirect(base_url('index.php/loundry'),'refresh');
        }
        
    }
    public function getDetailLaundry($id_laundry)
    {
        $dataDetail = $this->lnd->detailLaundry($id_laundry);
        echo json_encode($dataDetail);
    }
    public function updateLaundry()
    {
        $this->form_validation->set_rules('kode', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));
        $this->form_validation->set_rules('nama_laundry', 'fieldlabel', 'trim|required',array('required' => 'Semua data harus diisi'));

       
       if ($this->form_validation->run() == TRUE) {

            $prosesUpdate = $this->lnd->updateLaundry();
            
            if($prosesUpdate == TRUE){
                $this->session->set_flashdata('pesan', 'Sukses');
            }else {
                $this->session->set_flashdata('pesan', 'Gagal');
            }

            redirect(base_url('index.php/loundry'),'refresh');

       } else {
           $this->session->set_flashdata('pesan',
             validation_errors());
             
             redirect(base_url('index.php/loundry'),'refresh');
       }
    }
    public function deleteLaundry($id_laundry)
    {
        $prosesDelete = $this->lnd->deleteLaundry($id_laundry);

        if ($prosesDelete == TRUE) {
            $this->session->set_flashdata('pesan', 'Sukses');
        }else {
            $this->session->set_flashdata('pesan', 'Gagal');
        }
        redirect(base_url('index.php/loundry'),'refresh');
    }

}

/* End of file loundry.php */
