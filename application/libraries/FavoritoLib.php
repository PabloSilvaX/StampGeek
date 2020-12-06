<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class FavoritoLib extends CI_Object {
    
 
    public function cria_servico($data){
        $this->db->insert('servicos', $data);
    }

    public function listafav(){
        $rs = $this->db->get_where('favoritos');
        $result = $rs->result_array();
        return $result;
    }
    
    public function lista_estampas(){
        $rs = $this->db->get_where('estampa');
        $result = $rs->result_array();
        return $result;
    }
    
    public function deleta($id){
        $cond = array('id' => $id);
        return $this->db->delete('produtos', $cond); 
    }
    
    public function deleta_fav($id){
        $cond = array('id' => $id);
        return $this->db->delete('favoritos', $cond); 
    }
    
   
    public function edita_produto($data, $id){
        $this->db->update('produtos', $data, "id = $id");
        $data['nome'] = $this->input->post('nome');
        $data['descricao'] = $this->input->post('descricao');
        $data['preco'] = $this->input->post('preco');				                             
        $data['titulo_img'] = $this->input->post('titulo_img');
    }
   
    public function edita_estampa($data, $id){
        $this->db->update('estampa', $data, "id = $id");
        $data['estado'] = $this->input->post('estado');
    }
    
    public function service_data($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('produtos', $cond);
        return $rs->row_array();
    }
    
    public function service_data_est($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('estampa', $cond);
        return $rs->row_array();
    }
    
    public function service_data_fav($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('favoritos', $cond);
        return $rs->row_array();
    }



}