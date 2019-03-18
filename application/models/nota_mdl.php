<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota_mdl extends CI_Model {

	public function getnota()
    {
        $dataNta = $this->db->join('pembeli', 'pembeli.id_pembeli = nota.id_pembeli')->get('nota')->result();
        return $dataNta;
    }

    public function addnota()
    {
        $dataNta = array(
            'tgl'=>$this->input->post('tgl'),
            'bukti'=>$this->input->post('bukti'),
            'grandtotal'=>$this->input->post('grandtotal'),
            'id_pembeli'=>$this->input->post('id_pembeli')            
        );
        $sqlAdd = $this->db->insert('nota',$dataNta);
        return $sqlAdd;
    }

    public function updatenota()
    {
        $dataNta = array(
            'id_pembeli'=>$this->input->post('id_pembeli'),
            'tgl'=>$this->input->post('tgl'),
            'bukti'=>$this->input->post('bukti'),
            'grandtotal'=>$this->input->post('grandtotal')
        );
        $sqlUpdt = $this->db->where('id_nota', $this->input->post('id_nota'))->update('nota',$dataNta);
        return $sqlUpdt;
    }

    public function deletenota($id_nota)
    {
        $delete = $this->db->where('id_nota', $id_nota)->delete('nota');
        return $delete;
    }

    public function detailnota($id_nota)
    {
        $detail = $this->db->where('id_nota',$id_nota)->get('nota')->row();
        return $detail;
    }

}

/* End of file nota_mdl.php */
/* Location: ./application/models/nota_mdl.php */