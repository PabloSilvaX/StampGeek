<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class Usuario extends CI_Object {
    
    public function cria_usuario($data){
        $this->db->insert('usuario', $data);
    }
    
    public function lista(){
        $rs = $this->db->get_where('usuario');
        //echo $this->db->last_query();
        $result = $rs->result_array();
        return $result;
    }
    
  

    public function gera_perfil(){
        $rs = $this->db->get_where('usuario');
        //echo $this->db->last_query();
        $result = $rs->result_array();
        return $result;
    }
    
    public function delete($id){
        $cond = array('id' => $id);
        $this->db->delete('usuario', $cond); 
    }

    
    public function edita_usuario($data, $id){
        $this->db->update('usuario', $data, "id = $id");	
        $data['senha'] = md5($this->input->post('senha'));			                             
    }
    
    public function edita_perfil($data, $id){
        $this->db->update('usuario', $data, "id = $id");	
        $data['senha'] = md5($this->input->post('senha'));			                             
    }

    public function edita_identific($data, $id){
        $this->db->update('usuario', $data, "id = $id");		                             
    }

    
    
    public function user_data($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('usuario', $cond);
        return $rs->row_array();
    }
    
}