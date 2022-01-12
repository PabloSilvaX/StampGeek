<?php
include_once APPPATH.'libraries/ProdutoLib.php';
include_once APPPATH.'libraries/FavoritoLib.php';
include_once APPPATH.'libraries/BannerLib.php';
//essa model está gerando algumas tabelas para o index do controller da loja
//as tabelas cujas quais estão sendo geradas tem suas libraries incluidas acima.

class GeraModel extends CI_Model{


    public function geracar(){
        $html ='';

        $produtos = new ProdutoLib();
        $data = $produtos->listacar();

        foreach ($data as $prod) {

            

          if($this->session->userdata('id')==($prod['idcara'])||$this->session->userdata('level')==('1')){  

            $html .= '<tr>';
            $html .= '<td>'.$prod['id'].'</td>';
            $html .= '<td>'.$prod['idcara'].'</td>';
            $html .= '<td>'.$prod['nomecara'].'</td>';
            $html .= '<td>'.$prod['emailcara'].'</td>';
            $html .= '<td>'.$prod['nome'].'</td>';
            $html .= '<td>'.$prod['preco'].'</td>';
            $html .= '<td>'.$this->action_buttons_car($prod['id']).'</td>';
            $html .= '</tr>';   
          }
      
        }
        return $html;
    }

     public function gera_tabela_serv(){
        $html ='';

        $servicos = new ServicoLib();
        $data = $servicos->lista();

        foreach ($data as $serv) {

       
            $html .= '<div class="view overlay ">';
            $html .= '<div class=" staff text-center">';
            $html .= '';
            $html .= '<h3><span class="text-warning">'.$serv['nome'].'</span></h3>';
           $html .= '<p>'.$serv['detalhe'].'.</p>';
            $html .= '<h5 class="price text-white">R$: '.$serv['preco'].'</h5><br>';
            
            $html .= '<a href="';
            $html .= base_url('index.php/barbearia/ver_servico/');;
            $html .= $serv['id'];
            $html .= '"<p>Clique para saber mais...</p>';
            $html .= '<div class="mask flex-center rgba-black-light mt-1">';
            $html .= '<i class="far fa-eye text-warning fa-4x"></i><h2 class="">';
            
            $html .= $this->action_buttons($serv['id']);
            $html .= '  </h2></div></a></div>
</div><br>';
            
            
        }
        return $html;
    }

    
    public function gera_tabela_ava(){
        $html ='';

        $avaliacoes = new AvaliacaoLib();
        $data = $avaliacoes->lista();

        foreach ($data as $coment) {

            
            $html .= '<div class="carousel-item text-center">';
            
            $html .= '<img src="';
            $html .= base_url('uploads/');
            $html .= $coment['foto'];
            
            $html .= '.jpg" class="rounded-circle z-depth-0" style="width: 60px">';
            $html .= '<p class="text-warning mt-2">'.$coment['nome'].' Comentou:</p>';
            $html .= '<h5><i class="fas fa-quote-left"></i> '.$coment['comentario'].'</h5>';
            $html .= '<p>Enviado em: '.$coment['created'].'</p>';
            $html .= $this->action_buttons_ava($coment['id']);
            $html .= '</div>';   
        }
        return $html;
    }



    
    public function gera_tabela_produtos($setor){
        $html ='';

        $favoritos = new FavoritoLib();
        $rito = $favoritos->listafav();
        

        $produtos = new ProdutoLib();
        $data = $produtos->lista();

  

        foreach ($data as $prod) {


          

                if($prod['categoria']===$setor){


       
        
            $html .= '<div class="item">';

        

   $favoritado = '0';
               foreach ($rito as $fav) {
                 
                                        $diminui = $prod['favoritados'] - 1;
                                       

                               if($prod['id']===$fav['idproduto']){
                                      if($fav['idcara']===$this->session->userdata('id')){
                                          
                                       
                                        $html .= '
                                        <form method="POST" action="'.base_url('index.php/page/deletar_favorito/').'">

                                        <input value="';
                                        $html .= $prod['id'];
                                        $html .= '" type="hidden" name="idproduto" placeholder="" required>

                                        <input value="';
                                        $html .= $fav['id'];
                                        $html .= '" type="hidden" name="id" placeholder="" required>

                                        <input value="'.$diminui.'" type="hidden" name="favoritados" placeholder="" required>
                                     
                                        <button type="submit" style="border: none; position: absolute; outline: none;">
                                      <a class="active" data-toggle="tooltip" data-placement="top" title="Remover dos Favoritos">  
                                      <i class="fas fa-heart text-danger" style="margin-left: 255px; font-size: 32px;
                                          position: absolute; "></i>
                                          </a>
                                     </button>
                                    </form>             
                                    ';



                                         $favoritado = $favoritado + '1';
                                      }
                                     
                                 }
               }

              if($favoritado==='0'){
                $html .= '
                <form method="POST" action="'.base_url('index.php/page/cadastrar_favorito').'">
               
                      <input value="'.$this->session->userdata('id').'" class="w-100 text-white" type="hidden" name="idcara" placeholder="" required>
                      <input value="'.$prod['id'].'" class="w-100 text-white" type="hidden" name="idproduto" placeholder="" required>
                      <input value="'.$prod['nome'].'" class="w-100 text-white" type="hidden" name="nomeproduto" placeholder="" required>
                      <input value="R$: '.$prod['preco'].'" class="w-100 text-white" type="hidden" name="precoproduto" placeholder="" required>
                      <input value="'.$prod['titulo_img'].'" class="w-100 text-white" type="hidden" name="titulo_img" placeholder="" required>
                      <input value="'.base_url('index.php/loja/ver_produto/').''.$prod['id'].'" class="w-100 text-white" type="hidden" name="linkprod" placeholder="" required>
                      
                      <input value="';
                      $html .= $prod['favoritados'] + 1;
                      $html .= '" class="w-100 text-white" type="hidden" name="favoritados" placeholder="" required>
             ';
                $html .= '<button type="submit" style="border: none; position: absolute; outline: none;>"';
                $html .= '<a class="active" data-toggle="tooltip" data-placement="top" title="Adicionar aos Favoritos">
                <i class="fas fa-heart" style="margin-left: 255px; font-size: 32px;
                  position: absolute; "></i>
               </a>
             </button>
            </form>                         
            ';

              }
              
            
           
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
            $html .= '</strong><br>R$: '.$prod['preco'].'</p>';
            $html .= '<a href="';
            $html .= base_url('index.php/loja/ver_produto/');
            $html .= $prod['id'];
            $html .= '"><button class="btn btn-warning btn-lg" style="margin-left: 25px; margin-top: 1px; width: 250px;">';
            $html .= ''.$prod['nome'].'</button></a></div>';
        }
           
        }
        return $html;
    }
    

    
    public function gera_tabela_queridinhos(){
        $html ='';

        $favoritos = new FavoritoLib();
        $rito = $favoritos->listafav();
        

        $produtos = new ProdutoLib();
        $data = $produtos->lista();

  $primeiro = 0;
  $segundo = 0;
  $terceiro = 0;

        foreach ($data as $prod) {

            if($prod['favoritados']>$primeiro){
                $primeiro = $prod['id'];
               
            }
           
            
        }

        foreach ($data as $prod) {

             if($prod['id']!=$primeiro && $prod['id']!=$segundo){
                if($prod['favoritados']>$segundo){
                     $segundo = $prod['id'];
               
                  }
             }
            
        }

        foreach ($data as $prod) {
        if($prod['id']!=$primeiro && $prod['id']!=$segundo){
            if($prod['favoritados']>$terceiro){
                $terceiro = $prod['id'];
               
                }
         }
            
        }

        foreach ($data as $prod) {


if($prod['id']===$primeiro||$prod['id']===$segundo||$prod['id']===$terceiro){
       
        
            $html .= '<div class="item">';

        

   $favoritado = '0';
               foreach ($rito as $fav) {
                 
                                        $diminui = $prod['favoritados'] - 1;
                                       

                               if($prod['id']===$fav['idproduto']){
                                      if($fav['idcara']===$this->session->userdata('id')){
                                          
                                       
                                        $html .= '
                                        <form method="POST" action="'.base_url('index.php/page/deletar_favorito/').'">

                                        <input value="';
                                        $html .= $prod['id'];
                                        $html .= '" type="hidden" name="idproduto" placeholder="" required>

                                        <input value="';
                                        $html .= $fav['id'];
                                        $html .= '" type="hidden" name="id" placeholder="" required>

                                        <input value="'.$diminui.'" type="hidden" name="favoritados" placeholder="" required>
                                     
                                        <button type="submit" style="border: none; position: absolute; outline: none;">
                                      <a class="active" data-toggle="tooltip" data-placement="top" title="Adicionar aos Favoritos">  
                                      <i class="fas fa-heart text-danger" style="margin-left: 255px; font-size: 32px;
                                          position: absolute; "></i>
                                          </a>
                                     </button>
                                    </form>             
                                    ';



                                         $favoritado = $favoritado + '1';
                                      }
                                     
                                 }
               }

              if($favoritado==='0'){
                $html .= '
                <form method="POST" action="'.base_url('index.php/page/cadastrar_favorito').'">
               
                      <input value="'.$this->session->userdata('id').'" class="w-100 text-white" type="hidden" name="idcara" placeholder="" required>
                      <input value="'.$prod['id'].'" class="w-100 text-white" type="hidden" name="idproduto" placeholder="" required>
                      <input value="'.$prod['nome'].'" class="w-100 text-white" type="hidden" name="nomeproduto" placeholder="" required>
                      <input value="'.$prod['preco'].'" class="w-100 text-white" type="hidden" name="precoproduto" placeholder="" required>
                      <input value="'.$prod['titulo_img'].'" class="w-100 text-white" type="hidden" name="titulo_img" placeholder="" required>
                      <input value="'.base_url('index.php/loja/ver_produto/').''.$prod['id'].'" class="w-100 text-white" type="hidden" name="linkprod" placeholder="" required>
                      
                      <input value="';
                      $html .= $prod['favoritados'] + 1;
                      $html .= '" class="w-100 text-white" type="hidden" name="favoritados" placeholder="" required>
             ';
                $html .= '<button type="submit" style="border: none; position: absolute; outline: none;>"';
                $html .= '<a class="active" data-toggle="tooltip" data-placement="top" title="Adicionar aos Favoritos">
                <i class="fas fa-heart" style="margin-left: 255px; font-size: 32px;
                  position: absolute; "></i>
               </a>
             </button>
            </form>                         
            ';

              }
              
            
           
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
            $html .= '</strong><br>R$: '.$prod['preco'].'</p>';
            $html .= '<a href="';
            $html .= base_url('index.php/loja/ver_produto/');
            $html .= $prod['id'];
            $html .= '"><button class="btn btn-warning btn-lg" style="margin-left: 25px; margin-top: 1px; width: 250px;">';
            $html .= ''.$prod['nome'].'</button></a></div>';
        
           
        }elseif($primeiro===0){
  
            
            $html .= '<div class="item">';

        

   $favoritado = '0';
               foreach ($rito as $fav) {
                 
                                        $diminui = $prod['favoritados'] - 1;
                                       

                               if($prod['id']===$fav['idproduto']){
                                      if($fav['idcara']===$this->session->userdata('id')){
                                          
                                       
                                        $html .= '
                                        <form method="POST" action="'.base_url('index.php/page/deletar_favorito/').'">

                                        <input value="';
                                        $html .= $prod['id'];
                                        $html .= '" type="hidden" name="idproduto" placeholder="" required>

                                        <input value="';
                                        $html .= $fav['id'];
                                        $html .= '" type="hidden" name="id" placeholder="" required>

                                        <input value="'.$diminui.'" type="hidden" name="favoritados" placeholder="" required>
                                     
                                        <button type="submit" style="border: none; position: absolute; outline: none;">
                                      <a class="active" data-toggle="tooltip" data-placement="top" title="Adicionar aos Favoritos">  
                                      <i class="fas fa-heart text-danger" style="margin-left: 255px; font-size: 32px;
                                          position: absolute; "></i>
                                          </a>
                                     </button>
                                    </form>             
                                    ';



                                         $favoritado = $favoritado + '1';
                                      }
                                     
                                 }
               }

              if($favoritado==='0'){
                $html .= '
                <form method="POST" action="'.base_url('index.php/page/cadastrar_favorito').'">
               
                      <input value="'.$this->session->userdata('id').'" class="w-100 text-white" type="hidden" name="idcara" placeholder="" required>
                      <input value="'.$prod['id'].'" class="w-100 text-white" type="hidden" name="idproduto" placeholder="" required>
                      <input value="'.$prod['nome'].'" class="w-100 text-white" type="hidden" name="nomeproduto" placeholder="" required>
                      <input value="'.$prod['preco'].'" class="w-100 text-white" type="hidden" name="precoproduto" placeholder="" required>
                      <input value="'.$prod['titulo_img'].'" class="w-100 text-white" type="hidden" name="titulo_img" placeholder="" required>
                      <input value="'.base_url('index.php/loja/ver_produto/').''.$prod['id'].'" class="w-100 text-white" type="hidden" name="linkprod" placeholder="" required>
                      
                      <input value="';
                      $html .= $prod['favoritados'] + 1;
                      $html .= '" class="w-100 text-white" type="hidden" name="favoritados" placeholder="" required>
             ';
                $html .= '<button type="submit" style="border: none; position: absolute; outline: none;>"';
                $html .= '<a class="active" data-toggle="tooltip" data-placement="top" title="Adicionar aos Favoritos">
                <i class="fas fa-heart" style="margin-left: 255px; font-size: 32px;
                  position: absolute; "></i>
               </a>
             </button>
            </form>                         
            ';

              }
              
            
           
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

            $html .= '<p style="text-align: center; margin-top: 5px;">';
            $html .= $prod['nome'];
            $html .= '<br>'.$prod['preco'].'</p>';
            $html .= '<a href="';
            $html .= base_url('index.php/loja/ver_produto/');
            $html .= $prod['id'];
            $html .= '"><button class="btn btn-warning btn-lg" style="margin-left: 25px; margin-top: 1px; width: 250px;">';
            $html .= ''.$prod['nome'].'</button></a></div>';
        



        }
    }

    return $html;
}
    
    public function gera_tabela_informacoes(){
        $html ='';

        $informacoes = new InfoLib();
        $data = $informacoes->lista();

        foreach ($data as $infor) {


            $html .= '<div class="col-md-4 d-flex ftco-animate">
            <div class="icon ml-5">';
            $html .= $infor['icone'];
            $html .= '</i></div>
            <div class="text ml-3"><h5>';
            $html .= $infor['titulo'];
           
            $html .= '</h5>
                <p>';

           
            $html .= $infor['detalhes'];
            
            $html .= $this->action_buttons_info($infor['id']);
            $html .= '</p>';

            $html .= '</div>
        </div>';   
            
        }   
        return $html;
    }
    
    public function gera_tabela_fazemos(){
        $html ='';

        $fazemos = new FazemosLib();
        $data = $fazemos->lista();

        foreach ($data as $faze) {


             

            $html .= '
            <div class="col-md-3 ftco-animate">
            <div class="media d-block text-center block-6 services">
              <div class="justify-content-center align-items-center mb-4"><a href="';
            $html .= base_url('index.php/barbearia/servicos');
            $html .= '">';

            $html .= $faze['icone'];
            $html .= '</i></a></div>
            <div class="media-body">
                <h3 class="heading">';
            $html .= $faze['titulo'];
           
            $html .= '</h3>
                <p>';

           
            $html .= $faze['detalhes'];
            
            $html .= $this->action_buttons_faze($faze['id']);
            $html .= '</p>';

            $html .= '</div>
        </div>
        </div>';   
            
        }
        return $html;
    }

    public function gera_tabela_banner(){
        $html ='';

        $banner = new BannerLib();
        $data = $banner->lista();

        foreach ($data as $ban) {


            $html .= '<div class="carousel-item mt-2">
                        <h1 class="mt-5 mb-5 text-center" >
                            <a class="white-text" href="
                        ';
            $html .= base_url('index.php/barbearia/');
            $html .= $ban['link'];
            $html .= '">';
            $html .= $ban['titulo'];
            $html .= $this->action_buttons_banne($ban['id']);
            $html .= ' </a></h1><br><br>';
            $html .= '</div>';   
            
        }
        return $html;
    }

    
    private function action_buttons_prod($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/barbearia/editar_produto/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/barbearia/deleta_produto/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;}
    }
    
    private function action_buttons_banne($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/barbearia/editar_banner/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        return $html;}
    }
    
    private function action_buttons_info($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/barbearia/editar_info/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        return $html;}
    }
    
    private function action_buttons_faze($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/barbearia/editar_faze/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        return $html;}
    }

    private function action_buttons_ava($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/page/deleta_avaliacao/'.$id).'">';
        $html .= '<i title="Deletar Avaliação" class="fas fa-times-circle text-danger mt-1"></i></a>';
        return $html;}
    }


    private function action_buttons($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/page/deleta_serv/'.$id).'">';
        $html .= '<i title="Deletar Serviço" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/page/editar_serv/'.$id).'">';
        $html .= '<i title="Editar Serviço" class="far fa-edit text-info mt-1 ml-2"></i></a>';
        return $html;}
    }

}