<?php
include_once APPPATH.'libraries/ProdutoLib.php';
class ProdutoModel extends CI_Model{


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


    
    public function gera_tabela(){
        $html ='';

        $produtos = new ProdutoLib();
        $data = $produtos->lista();

        foreach ($data as $prod) {

            
            $html .= '<tr>';
            $html .= '<td>'.$prod['id'].'</td>';


            $html .= '<td><a href="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" class="text-dark"><img src="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" 
            alt="thumbnail" class="img-thumbnail"
  style="width: 200px"></a></td>';



            $html .= '<td><h5>'.$prod['nome'].'</h5></td>';
            $html .= '<td>'.$prod['descricao'].'</td>';
            $html .= '<td>'.$prod['preco'].'</td>';
            $html .= '<td>'.$prod['categoria'].'</td>';
            if($prod['visao']==='1'){
                $html .= '<td class="row">'.$this->action_buttons_ocultar($prod['id']).'</td>';
            }
                if($prod['visao']==='2'){
                $html .= '<td class="row">'.$this->action_buttons_exibir($prod['id']).'</td>';
            }
            $html .= '</tr>';   
        }
        return $html;
    }
    

    
    public function gera_tabela_estampas(){
        $html ='';

        $produtos = new ProdutoLib();
        $data = $produtos->lista_estampas();

        foreach ($data as $prod) {

            
            $html .= '<tr>';
            $html .= '<td>'.$prod['id'].'</td>';
            $html .= '<td>'.$prod['nome'].'</p>';
            $html .= '<td><a href="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg"><img src="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" alt="thumbnail" class="img-thumbnail"
            style="width: 200px"></a></td>';
            $html .= '<td>'.$prod['categoria'].'</td>';
            
            if($prod['estado']==='1'){
            $html .= '<td>'.$this->action_buttons_estocultar($prod['id']).'</td>';
        }
            if($prod['estado']==='2'){
            $html .= '<td>'.$this->action_buttons_estexibir($prod['id']).'</td>';
        }
            $html .= '</tr>';   
        }
        return $html;
    }
    
    
    public function gera_tabela_estampastab(){
        $html ='';

        $produtos = new ProdutoLib();
        $data = $produtos->lista_estampas();

        $controle = '1';



        $html .= '
        
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
        <div class="row mt-1">';
                 

        
        
        
     
  
foreach ($data as $prod) {
    
    if($prod['categoria']==="Animes/HQs" && $prod['estado']==='1'){
    $controle = $controle + 1;

     $html .= '<div class="col-md-2 mt-2" style="border: 1px solid; height: 50px; margin: 0 0 15px 15px;">

     <a href="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg">
               <img src="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" class="img-fluid" alt="Responsive image" style="width: 70px; height:50px;">
        </a>

                 <div class="custom-control custom-radio text-center mx-auto">
                
                   <input type="radio" class="custom-control-input" value="'.$prod['nome'].'" id="customControlValidation'.$controle.'" name="estampa">
                  
                   <label class="custom-control-label" for="customControlValidation'.$controle.'">
                   </label>
              
                   </div> 
                   </div> 
                         
                  ';
                    
                    }
  

                }

  $html .= '</div></div>';

        $html .= '
        
        <div class="tab-pane fade" id="profile" name="estampa" role="tabpanel" aria-labelledby="profile-tab">  
        <div class="row mt-1">';
                 

        
        
        
     
  
foreach ($data as $prod) {
    
    if($prod['categoria']==="Filmes" && $prod['estado']==='1'){
    $controle = $controle + 1;

     $html .= '<div class="col-md-2 mt-2" style="border: 1px solid; height: 50px; margin: 0 0 15px 15px;">

     <a href="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg">
               <img src="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" class="img-fluid" alt="Responsive image" style="width: 70px; height:50px;">
               </a> 

               <div class="custom-control custom-radio text-center mx-auto">
                   <input type="radio" class="custom-control-input" value="'.$prod['nome'].'" id="customControlValidation'.$controle.'" name="estampa">
                  
                   <label class="custom-control-label" for="customControlValidation'.$controle.'">
                   </label>
                    

                   </div> 
                   </div> 
                         
                  ';
                    
                    }
  

                }

  $html .= '</div></div>';
        $html .= '
        
        <div class="tab-pane fade" id="contact" name="estampa" role="tabpanel" aria-labelledby="contact-tab">  
        <div class="row mt-1">';
                 

        
        
        
     
  
foreach ($data as $prod) {
    
    if($prod['categoria']==="Séries" && $prod['estado']==='1'){
    $controle = $controle + 1;

     $html .= '<div class="col-md-2 mt-2" style="border: 1px solid; height: 50px; margin: 0 0 15px 15px;">

     <a href="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg">
               <img src="'.base_url('uploads/').''.$prod['titulo_img'].'.jpg" class="img-fluid" alt="Responsive image" style="width: 70px; height:50px;">
             </a>   
               
               <div class="custom-control custom-radio text-center mx-auto">
                
                   <input type="radio" class="custom-control-input" value="'.$prod['nome'].'" id="customControlValidation'.$controle.'" name="estampa">
                  
                   <label class="custom-control-label" for="customControlValidation'.$controle.'">
                   </label>
              
                   </div> 
                   </div> 
                         
                  ';
                    
                    }
  

                }

  $html .= '</div></div>';

        return $html;
    }
    

    
    public function gera_tabela_produtos_v(){
        $html ='';

        $produtos = new ProdutoLib();
        $data = $produtos->lista();

        foreach ($data as $prod) {

           
            $html .= '<div class="col-md-4 mt-3">
            <div class=" text-center"><a href="';
            $html .= base_url('index.php/barbearia/#produtos');
            $html .= '"><img src="';
            $html .= base_url('uploads/');
            $html .= $prod['titulo_img'];
            $html .= '.jpg" class="img-fluid" alt="Produto 1"></a>';
            $html .= '
            <div class="text"><a href="';
            $html .= base_url('index.php/loja/ver_produto/');
            $html .= $prod['id'];
            $html .= '"><p>Veja Mais</p></a>
            <h3>';
            $html .= '<strong class="text-warning">'.$prod['nome'].'</strong></h3>';
            
            $html .= '<span class="price mb-4">R$'.$prod['preco'].'</span>';
            $html .= '<td>'.$this->action_buttons($prod['id']).'</td>';
            $html .= '    
                </div>
            </div>
        </div>';   
        }
        return $html;
    }

    
    private function action_buttons($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/loja/editar_produto/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/deleta_produto/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;}
    }
    
    private function action_buttons_estocultar($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/page/editar_estampa/'.$id).'">';
        $html .= '<i title="Ocultar" class="far fa-eye-slash text-danger mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/deleta_estampa/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;
    }
    }
    
    private function action_buttons_estexibir($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/page/editar_estampa/'.$id).'">';
        $html .= '<i title="Exibir" class="far fa-eye text-success mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/deleta_estampa/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;
    }
    }
    
    private function action_buttons_ocultar($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/loja/editar_produtovisao/'.$id).'">';
        $html .= '<i title="Ocultar" class="far fa-eye-slash text-danger mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/editar_produto/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/deleta_produto/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;
    }
    }
    
    private function action_buttons_exibir($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/loja/editar_produtovisao/'.$id).'">';
        $html .= '<i title="Exibir" class="far fa-eye text-success mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/editar_produto/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/deleta_produto/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;
    }
    }


  

    public function edita_produto($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new ProdutoLib();
        $produto->edita_produto($data, $id);
        redirect('page/lista_produtos');
    }
  

    public function edita_produtovisao($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new ProdutoLib();
        $produto->edita_produtovisao($data, $id);
        redirect('page/lista_produtos');
    }

    public function edita_produtofav($ids, $fav){
        $this->db->update('produtos', $fav, "id = $ids");
        $fav['favoritados'] = $this->input->post('favoritados');
        header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
    }

    public function edita_produtofavdel($cleiton, $data){
        $this->db->update('produtos', $data, "id = $cleiton");
        $fav['favoritados'] = $this->input->post('favoritados');
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
    

    public function deleta_estampa($id){
        $produto= new ProdutoLib();
        $produto->deleta_est($id);
    }
    
     

    public function read($id){
        $servicos = new ProdutoLib();
        return $servicos->service_data($id);
    }
    

    public function read_est($id){
        $servicos = new ProdutoLib();
        return $servicos->service_data_est($id);
    }
    
}
