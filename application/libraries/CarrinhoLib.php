<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class CarrinhoLib extends CI_Object {
    
    public function listacar(){
        $rs = $this->db->get_where('carrin');
        $result = $rs->result_array();
        return $result;
    }

       
    public function insere_car($data){
        $this->db->insert('carrin', $data);
    }


    public function cria_servico($data){
        $this->db->insert('servicos', $data);
    }

    public function lista(){
        $rs = $this->db->get_where('carrin');
        $result = $rs->result_array();
        return $result;
    }
    
    public function deleta($id){
        $cond = array('id' => $id);
        return $this->db->delete('carrin', $cond); 
    }

    public function deletatudo($id){
        while($cond = array('idcara' => $id)){
        $cond = array('idcara' => $id);
        return $this->db->delete('carrin', $cond);
     }
    }
    
   
    public function edita_produto_car($data, $id){
        $this->db->update('carrin', $data, "id = $id");
        $data['Qtd'] = $this->input->post('Qtd');
    }
    
   
    public function edita_carr($data, $id){
        $this->db->update('carrin', $data, "id = $id");
        $data['Qtd'] = $this->input->post('Qtd');
    }
    
    public function service_data($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('produtos', $cond);
        return $rs->row_array();
    }



}