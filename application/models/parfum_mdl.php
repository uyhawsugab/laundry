<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Parfum_mdl extends CI_Model {

	public function getParfum()
    {
        $dataPrf = $this->db->get('parfum')->result();
        return $dataPrf;
    }

    public function addParfum()
    {

        $config['upload_path'] = './assets/uploads/parfum';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']  = '100000';
        $config['max_width']  = '102400';
        $config['max_height']  = '76800';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('gambar')){
            $this->session->set_flashdata('pesan', $this->upload->display_errors());
            return false;
        }
        else{
            $dataPrf = array(
                'nama_parfum' => $this->input->post('nama_parfum'),
                'harga' => $this->input->post('harga'),
                'gambar' => $this->upload->data('file_name')
            );
            $sqlAdd = $this->db->insert('parfum',$dataPrf);
            return $sqlAdd;
        }
        
    }

    public function updateParfum()
    {
        $namaGambar = $_FILES['gambar']['name'];
        if($namaGambar != ''){
        
            $config['upload_path'] = './assets/uploads/parfum';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size']  = '100000';
            $config['max_width']  = '102400';
            $config['max_height']  = '768000';
            
            $this->load->library('upload', $config);
            
            if ( ! $this->upload->do_upload('gambar')){
                $this->session->set_flashdata('pesan', $this->upload->display_errors());
                return false;
            }
            else{
                $dataPrf = array(
                    'nama_parfum' => $this->input->post('nama_parfum'),
                    'harga' => $this->input->post('harga'),
                    'gambar' => $this->upload->data('file_name')
                );
                $sqlUpdt = $this->db->where('id_parfum', $this->input->post('id_parfum'))->update('parfum',$dataPrf);
                return $sqlUpdt;
            }
        }else{

        $dataPrf = array(
            'nama_parfum' => $this->input->post('nama_parfum'),
            'harga' => $this->input->post('harga')
        );
        $sqlUpdt = $this->db->where('id_parfum', $this->input->post('id_parfum'))->update('parfum',$dataPrf);
        return $sqlUpdt;

        }
    }

    public function deleteParfum($id_parfum)
    {
        $delete = $this->db->where('id_parfum', $id_parfum)->delete('parfum');
        return $delete;
    }

    public function detailParfum($id_parfum)
    {
        $detail = $this->db->where('id_parfum',$id_parfum)->get('parfum')->row();
        return $detail;
    }

}

/* End of file parfum_mdl.php */
/* Location: ./application/models/parfum_mdl.php */