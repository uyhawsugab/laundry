<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Layanan_mdl extends CI_Model {

	public function getLayanan()
    {
        $dataLyn = $this->db->get('layanan')->result();
        return $dataLyn;
    }

    public function addLayanan()
    {
        $dataLyn = array(
        	'Kode' => $this->input->post('Kode'),
            'nama_layanan' => $this->input->post('nama_layanan')
        );
        $sqlAdd = $this->db->insert('layanan',$dataLyn);
        return $sqlAdd;
    }

    public function updateLayanan()
    {
        $dataLyn = array(
        	'Kode' => $this->input->post('Kode'),
            'nama_layanan' => $this->input->post('nama_layanan')
        );
        $sqlUpdt = $this->db->where('id_layanan', $this->input->post('id_layanan'))->update('layanan',$dataLyn);
        return $sqlUpdt;
    }

    public function deleteLayanan($id_layanan)
    {
        $delete = $this->db->where('id_layanan', $id_layanan)->delete('layanan');
        return $delete;
    }

    public function detailLayanan($id_layanan)
    {
        $detail = $this->db->where('id_layanan',$id_layanan)->get('layanan')->row();
        return $detail;
    }

}

/* End of file layanan_mdl.php */
/* Location: ./application/models/layanan_mdl.php */