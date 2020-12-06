<?php

class PesquisaModel extends CI_Model{


	public function buscar($busca){
		
		if(empty($busca))
       		return array();

		$busca = $this->input->post('busca');

		$this->db->like('nome', $busca);
		$query = $this->db->get('produtos');
		return $query->result_array();

    }
    
}