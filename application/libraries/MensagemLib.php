<?php
include_once APPPATH.'libraries/util/CI_Object.php';

class MensagemLib extends CI_Object {
    
    public function insere_msg($data){
        $this->db->insert('mensagens_contatos', $data);
    }

    public function lista(){
        $rs = $this->db->get_where('mensagens_contatos');
        $result = $rs->result_array();
        return $result;
    }
    
    public function deleta($id){
        $cond = array('id' => $id);
        return $this->db->delete('mensagens_contatos', $cond); 
    }
    

    public function edita_mensagem($data, $id){
        $this->db->update('mensagens_contatos', $data, "id = $id");
        $data['estadoadm'] = $this->input->post('estadoadm');
        $data['estado'] = $this->input->post('estado');
        $data['valor'] = $this->input->post('valor');
        $data['data'] = $this->input->post('data');
        $data['motivo'] = $this->input->post('motivo');
        $data['motivocli'] = $this->input->post('motivocli');
        $data['local'] = $this->input->post('local');
        $data['veiculoentrega'] = $this->input->post('veiculoentrega');
        $data['cidade'] = $this->input->post('cidade');
        $data['bairro'] = $this->input->post('bairro');
        $data['rua'] = $this->input->post('rua');
        $data['ncasa'] = $this->input->post('ncasa');
    }


    public function estilista_data($id){
        $cond = array('id' => $id);
        $rs = $this->db->get_where('mensagens_contatos', $cond);
        return $rs->row_array();
    }


}