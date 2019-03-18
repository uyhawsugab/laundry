<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class pakaian_mdl extends CI_Model {

    
    public function getPakaian()
    {
        $dataPkn = $this->db->get('pakaian')->result();
        return $dataPkn;
    }

    public function addPakaian()
    {

        $config['upload_path'] = './assets/uploads/pakaian';
        $config['allowed_types'] = 'gif|jpg|png|gif|jpeg';
        $config['max_size']  = '100000';
        $config['max_width']  = '102400';
        $config['max_height']  = '76800';
        
        $this->load->library('upload', $config);
        
        if ( ! $this->upload->do_upload('gambar')){
            $this->session->set_flashdata('pesan', $this->upload->display_errors());
            return false;
        }
        else{
            $dataPkn = array(
                'jenis_pakaian' => $this->input->post('jenis_pakaian'),
                'harga' => $this->input->post('harga'),
                'gambar' => $this->upload->data('file_name')
            );
            $sqlAdd = $this->db->insert('pakaian',$dataPkn);
            return $sqlAdd;
        }
        
    }

    public function updatePakaian()
    {
        $namaGambar = $_FILES['gambar']['name'];
        if($namaGambar != ''){
        
            $config['upload_path'] = './assets/uploads/pakaian';
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
                $dataPkn = array(
                    'jenis_pakaian' => $this->input->post('jenis_pakaian'),
                    'harga' => $this->input->post('harga'),
                    'gambar' => $this->upload->data('file_name')
                );
                $sqlUpdt = $this->db->where('id_pakaian', $this->input->post('id_pakaian'))->update('pakaian',$dataPkn);
                return $sqlUpdt;
            }
        }else{

        $dataPkn = array(
            'jenis_pakaian' => $this->input->post('jenis_pakaian'),
            'harga' => $this->input->post('harga')
        );
        $sqlUpdt = $this->db->where('id_pakaian', $this->input->post('id_pakaian'))->update('pakaian',$dataPkn);
        return $sqlUpdt;

        }
    }

    public function deletePakaian($id_pakaian)
    {
        $delete = $this->db->where('id_pakaian', $id_pakaian)->delete('pakaian');
        return $delete;
    }

    public function detailPakaian($id_pakaian)
    {
        $detail = $this->db->where('id_pakaian',$id_pakaian)->get('pakaian')->row();
        return $detail;
    }

}

/* End of file pakaian_mdl.php */
