<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class PaisagemModel extends CI_Model{
    public function salva(){
        $img_name = $this->input->post('titulo_img');
        
         // crie as configurações do arquivo que será enviado
         $config['upload_path']          = './uploads/';
         $config['allowed_types']        = 'jpg|png';
         $config['max_size']             = 4096;
         $config['file_name']           = $img_name.'.jpg';
         $config['overwrite']           = true;  
            //$config['max_width']            = 1024;
            //$config['max_height']           = 768;
        $this->load->library('upload', $config);

        $this->upload->do_upload('userfile');

       
        return $this->image_card('.jpg');

    }

    private function image_card($img){
       $html = '<div class="card">
            <img class="card-img-top img-thumbnails" src="'.base_url('uploads/'.$img).'">
        </div>';
        return $html;
    }

    public function lista(){
        //$v = get_filenames('uploads');
        //$html = '';

        //foreach($v AS $img){
          //  $html .= '<div class="col-md-3">';
            //$html .= $this->image_card($img);
            //$html .= '</div>';
        //}
        //return $html;
    }
}