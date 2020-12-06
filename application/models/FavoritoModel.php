<?php
include_once APPPATH.'libraries/ProdutoLib.php';
include_once APPPATH.'libraries/FavoritoLib.php';
class FavoritoModel extends CI_Model{


    public function insere_produ($produ){
        if(sizeof($_POST) == 0) return;
        
        $data['imagens'] = $this->paisagem->salva();
        $this->db->insert('produtos', $produ);
        redirect('/page/lista_produtos');
    }

    public function insere_est($produ){
        if(sizeof($_POST) == 0) return;
        
        $data['imagens'] = $this->paisagem->salva();
        $this->db->insert('estampa', $produ);
        redirect('/page/lista_estampas');
    }


    
    public function gera_tabelafav(){
        $html ='';

        $produtos = new FavoritoLib();
        $data = $produtos->listafav();

        foreach ($data as $prod) {

            
            $html .= '<tr>';
            $html .= '<td>'.$prod['id'].'</td>';
            $html .= '<td><p href="'.base_url('index.php/cliente/detalhe/'.$prod['id']).'">'.$prod['nome'].'</p></td>';
            $html .= '<td>'.$prod['descricao'].'</td>';
            $html .= '<td>'.$prod['preco'].'</td>';
            $html .= '<td>'.$this->action_buttons($prod['id']).'</td>';
            $html .= '</tr>';   
        }
        return $html;
    }
    
    public function gera_tabela(){
        $html ='';

        $produtos = new FavoritoLib();
        $data = $produtos->listafav();

        foreach ($data as $prod) {

            if($this->session->userdata('id')===$prod['idcara']){
            $html .= '<tr>';
           



            $html .= '<td><a href="'.$prod['linkprod'].'" class="text-dark"><img src="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" 
            alt="thumbnail" class="img-thumbnail"
  style="width: 200px"></a></td>';



            $html .= '<td><h5><a href="'.$prod['linkprod'].'" class="text-dark">'.$prod['nomeproduto'].'</a></h5></td>';
            $html .= '<td>'.$prod['precoproduto'].'</td>';
            $html .= '<td>'.$this->action_buttons($prod['id']).'</td>';
            $html .= '</tr>';   
            }
        }
        return $html;
    }
 

    
    private function action_buttons($id){
        if($this->session->userdata('level')>'0'){
        $html = '';
        $html .= '<a href="'.base_url('index.php/page/deletar_favorito/'.$id).'">';
        $html .= '<i class="fas fa-heart text-danger fa-3x"></i></a>';
        return $html;}
    }



    public function edita_produto($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new ProdutoLib();
        $produto->edita_produto($data, $id);
        redirect('loja');
    }


    
    public function edita_produtofav($id, $fav){
        $this->db->update('produtos', $fav, "id = $id");
        $fav['favoritados'] = $this->input->post('favoritados');
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
    }

    public function edita_estampa($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new ProdutoLib();
        $produto->edita_estampa($data, $id);
        redirect('page/lista_estampas');
    }

    public function deleta_prod($id){
        $produto= new ProdutoLib();
        $produto->deleta($id);
    }
    

    public function deleta_fav($id){
        $favorito= new FavoritoLib();
        $favorito->deleta_fav($id);
    }
    
     

    public function read($id){
        $servicos = new ProdutoLib();
        return $servicos->service_data($id);
    }
    

    public function read_est($id){
        $servicos = new ProdutoLib();
        return $servicos->service_data_est($id);
    }
    

    public function read_fav($id){
        $servicos = new FavoritoLib();
        return $servicos->service_data_fav($id);
    }
    
}
