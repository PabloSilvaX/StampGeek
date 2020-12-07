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

        $favoritos = new FavoritoLib();
        $rito = $favoritos->listafav();
        

        $produtos = new ProdutoLib();
        $data = $produtos->lista();

  


        foreach ($data as $prod) {


          

   
    
     

    

$favoritado = '0';
           foreach ($rito as $fav) {
             
                                    $diminui = $prod['favoritados'] - 1;
                                   

                           if($prod['id']===$fav['idproduto']){
                                  if($fav['idcara']===$this->session->userdata('id')){
                                         $html .= '<div class="item">';
                                   
                                    $html .= '
                                    <form method="POST" action="'.base_url('index.php/page/deletar_favorito/').'" class="mt-2">

                                    <input value="';
                                    $html .= $prod['id'];
                                    $html .= '" type="hidden" name="idproduto" placeholder="" required>

                                    <input value="';
                                    $html .= $fav['id'];
                                    $html .= '" type="hidden" name="id" placeholder="" required>

                                    <input value="'.$diminui.'" type="hidden" name="favoritados" placeholder="" required>
                                 
                                    <button type="submit" style="border: none; outline: none; background-color: transparent;">
                                  <a class="active" data-toggle="tooltip" data-placement="top" title="Remover dos Favoritos">  
                                  <i class="fas fa-heart text-danger" style=" font-size: 35px; "></i>
                                      </a>
                                 </button>
                                </form>            
                                
                                
                                
                                ';


       
                                $html .= '
                                <a href="';
                                $html .= base_url('index.php/loja/ver_produto/');
                                $html .= $prod['id'];
                                $html .= '"><img src="';
                                $html .= base_url('uploads/');
                                $html .= $prod['titulo_img'];
                                $html .= '.jpg" 
                                alt="thumbnail" class="img-thumbnail mt-2 mx-auto d-block"
                                style="width: 250px; height:250px;">
                                </a>';
                                if($this->session->userdata('level')==='1'){
                                $html .= '<div class="row mx-auto text center">';
                                $html .= '<a class="mr-5 ml-3 text-dark" href="';
                                $html .= base_url('index.php/loja/editar_produto/');
                                $html .= $prod['id'];
                                $html .= '">';
                                $html .= " <i class='far fa-edit text-info'></i> Editar</a>";
                        
                        
                                $html .= '<a class="ml-5 text-dark" href="';
                                $html .= base_url('index.php/loja/deleta_produto/');
                                $html .= $prod['id'];
                                $html .= '">';
                                $html .= " <i class='fas fa-times-circle text-danger'></i> Deletar</a></div>";
                                }
                        
                                $html .= '<p style="text-align: center; margin-top: 5px;"><strong style="color: #FF8C00;">';
                                $html .= $prod['nome'];
                                $html .= '</strong><br>'.$prod['preco'].'</p>';
                                $html .= '<a href="';
                                $html .= base_url('index.php/loja/ver_produto/');
                                $html .= $prod['id'];
                                $html .= '"><button class="btn btn-warning btn-lg" style="margin-left: 25px; margin-top: 1px; width: 250px;">';
                                $html .= ''.$prod['nome'].'</button></a></div>';
                            

                                     $favoritado = $favoritado + '1';
                                  }
                                 
                             }
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
