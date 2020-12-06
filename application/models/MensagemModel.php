<?php
include_once APPPATH.'libraries/MensagemLib.php';
class MensagemModel extends CI_Model{


    
    public function insere_msg($data){
        if(sizeof($_POST) == 0) return;
        
        $this->db->insert('mensagens_contatos', $data);
        redirect('/page/mensagens');
    }


     public function gera_tabela(){
        $html ='';

        $mensagens = new MensagemLib();
        $data = $mensagens->lista();

        
        foreach ($data as $assunto) {
            if($this->session->userdata('id')===$assunto['idcara']||$this->session->userdata('level')==='1'){
            $html .= '<tr>';
            $html .= '<td>'.$assunto['id'].'</td>';
            $html .= '<td>'.$assunto['nome'].'</td>';
            $html .= '<td>'.$assunto['assunto'].'</td>';

            $html .= '<td><a href="'.$assunto['referencia'].'">';
            $html .= $assunto['nomereferencia'];
            $html .= '</a></td>';

            $html .= '<td>'.$assunto['estadoadm'].'</td>';
            $html .= '<td>'.$assunto['estado'].'</td>';
            $html .= '<td>'.$assunto['valor'].'</td>';
            $html .= '<td>'.$assunto['created'].'</td>';
            $html .= '<td>'.$assunto['data'].'</td>';
            
            $html .= '<td>'.$this->action_buttons($assunto['id']).'</td>';
            $html .= '</tr>'; 
            }  
        }
        return $html;
    }

    private function action_buttons($id){
        $html = '';
        $html .= '<a href="'.base_url('index.php/page/ver_msg/'.$id).'">';
        $html .= '<i title="Ver mais" class="far fa-eye text-warning"></i></a>';
        $html .= '<a href="'.base_url('index.php/page/editar_msg/'.$id).'">';
        $html .= '<i title="Gerenciar" class="fas fa-edit text-info ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/page/deletando/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger ml-2"></i></a>';
        return $html;
    }

    public function deleta_msg($id){
        $mensagens= new MensagemLib();
        $mensagens->deleta($id);
    }
    

    public function edita_mensagem($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new MensagemLib();
        $produto->edita_mensagem($data, $id);
       redirect('/page/ver_msg/'.$id.'');
    }



    public function read($id){
        $mensagens = new MensagemLib();
        return $mensagens->estilista_data($id);
    }
    
}