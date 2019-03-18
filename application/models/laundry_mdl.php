<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Laundry_mdl extends CI_Model {

    public function getLaundry()
    {
        $dataLnd = $this->db->get('laundry')->result();
        return $dataLnd;
    }

    public function addLaundry()
    {
        $dataLnd = array(
            'kode' => $this->input->post('kode'),
            'nama_laundry' => $this->input->post('nama_laundry')
        );

        $sqlAdd = $this->db->insert('laundry',$dataLnd);
        return $sqlAdd;
    }
    public function updateLaundry()
    {
        $dataLnd = array(
            'kode' => $this->input->post('kode'),
            'nama_laundry' => $this->input->post('nama_laundry')
        );

        $sqlUpdt = $this->db->where('id_laundry', $this->input->post('id_laundry'))->update('laundry',$dataLnd);
        return $sqlUpdt;
    }
    public function deleteLaundry($id_laundry)
    {
        $delete = $this->db->where('id_laundry', $id_laundry)->delete('laundry');
        return $delete;
    }
    public function detailLaundry($id_laundry)
    {
        $detail = $this->db->where('id_laundry',$id_laundry)->get('laundry')->row();
        return $detail;
    }


}

/* End of file Laundry_mdl.php */
