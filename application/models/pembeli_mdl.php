<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembeli_mdl extends CI_Model {

	public function getPembeli()
    {
        $dataPmbl = $this->db->get('pembeli')->result();
        return $dataPmbl;
    }

    public function masuk_db()
    {
        $dataPmbl=array(
            'nama_pembeli'=>$this->input->post('nama_pembeli'),
            'telp'=>$this->input->post('telp'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
        );
        $sql_masuk=$this->db->insert('pembeli', $dataPmbl);
        return $sql_masuk;
    }

    public function updatepembeli()
    {
        $dataPmbl = array(
            'nama_pembeli'=>$this->input->post('nama_pembeli'),
            'telp'=>$this->input->post('telp'),
            'username'=>$this->input->post('username'),
            'password'=>$this->input->post('password'),
        );
        $sqlUpdt = $this->db->where('id_pembeli', $this->input->post('id_pembeli'))->update('pembeli',$dataPmbl);
        return $sqlUpdt;
    }

    public function deletepembeli($id_pembeli)
    {
        $delete = $this->db->where('id_pembeli', $id_pembeli)->delete('pembeli');
        return $delete;
    }

    public function detailpembeli($id_pembeli)
    {
        $detail = $this->db->where('id_pembeli',$id_pembeli)->get('pembeli')->row();
        return $detail;
    }

}

/* End of file pembeli_mdl.php */
/* Location: ./application/models/pembeli_mdl.php */