<?php
class Page extends CI_Controller{
  function __construct(){
    parent::__construct();

    //   ~   Checa se esta logado se não estiver manda pro login
    //if($this->session->userdata('logged_in') !== TRUE){
      //redirect('login');
    //}
  }

  function index(){
    //Allowing akses to admin only
      if($this->session->userdata('level')==='1'){
                $this->load->view('template/header');
        $this->load->view('template/navbar_cadastro');
          $this->load->view('ver/admin_view');
          $this->load->view('template/footer');
          $this->load->view('template/rodape');
      }else{
        $this->load->view('template/header');
          redirect('login');
      }

  }

  function staff(){
    //Allowing akses to staff only
    if($this->session->userdata('level')==='2'){
      $this->load->view('login/cliente');

    }else{
      redirect('login');
  }
  }

  function author(){
    //Allowing akses to author only
    if($this->session->userdata('level')==='3'){
      $this->load->view('dashboard_view');
    }else{
      redirect('login');
  }
  }




// detalhamento md5 pó concentrado

public function admin(){
  if($this->session->userdata('level')==='1'){
    $this->db->select('*');
    $dados['usuarios'] = $this->db->get('usuario')->result();
    $this->load->view('template/navbar_cadastro');
    $this->load->view('template/header');
    $this->load->view('ver/cadastro');
    $this->load->view('template/footer');
    $this->load->view('template/rodape');
    $this->load->view('ver/conexao');
  }else{
    $this->load->view('template/header');
    redirect('login');
  }
}

public function cadastrar_me(){
  
    $this->db->select('*');
    $dados['usuarios'] = $this->db->get('usuario')->result();
    $this->load->view('template/header');
    $this->load->view('template/navbar');
    $this->load->view('ver/cadastro_livre');
    $this->load->view('template/footer');
    $this->load->view('template/rodape');
    $this->load->view('ver/conexao');
  
}


public function cliente($id){
  if($this->session->userdata('id')=== $id){
    $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);
    $this->load->model('UserModel', 'model');
    $data['senha'] = md5($this->input->post('senha'));
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/perfil_cliente', $data);
    $this->model->edita_perfil($id);
		$this->load->view('template/footer');
		$this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');

  }

}





public function resultado(){
        
		$this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);


  $this->load->model('PesquisaModel');
  $dados['listagem'] = $this->PesquisaModel->buscar($_POST);

  $this->load->view('template/header');
  $this->load->view('ver/resultado', $dados);
  $this->load->view('template/footer');
  $this->load->view('template/rodape');

}



public function cadastrar(){

    $data['titulo_img'] = $this->input->post('titulo_img');
    $data['nome'] = $this->input->post('nome');
    $data['email'] = $this->input->post('email');
    $data['senha'] = md5($this->input->post('senha'));
    $data['telefone'] = $this->input->post('telefone');
    $data['nivel'] = $this->input->post('nivel');
    $this->load->view('template/navbar_cadastro');
    $this->load->view('template/header');

    if ($this->db->insert('usuario', $data)){
     
     
      if($this->session->userdata('level')==='1'){ redirect('page/lista');
      } else{ redirect('login');}
    
    
    }
  
}



public function cadastrar_banner(){
  if($this->session->userdata('level')==='1'){
    $this->load->helper('file');

    $this->load->model('PaisagemModel', 'paisagem');

   $data['imagens'] = $this->paisagem->salva();

   
    $this->load->model('BannerModel', 'model');

  $produ['link'] = $this->input->post('link');
  $produ['titulo_img'] = $this->input->post('titulo_img');
   
      $this->load->view('template/header');

    $this->load->view('template/navbar_cadastro');
$this->load->view('ver/form_carrousel.php');

$this->load->view('template/footer');
$this->load->view('template/rodape');
    if ($this->model->insere_carroul($produ, $data)){
      redirect('');
    }
  }else{
    $this->load->view('template/header');
      redirect('login');
  }
}


public function cadastrar_estampa(){
  if($this->session->userdata('level')==='1'){
    $this->load->helper('file');

    $this->load->model('PaisagemModel', 'paisagem');

   $data['imagens'] = $this->paisagem->salva();

   
    $this->load->model('ProdutoModel', 'model');

  $produ['nome'] = $this->input->post('nome');
  $produ['titulo_img'] = $this->input->post('titulo_img');
  $produ['categoria'] = $this->input->post('categoria');
  $produ['estado'] = $this->input->post('estado');
  
   
      $this->load->view('template/header');

    $this->load->view('template/navbar_cadastro');
$this->load->view('ver/form_estampa.php');

$this->load->view('template/footer');
$this->load->view('template/rodape');

    if ($this->model->insere_est($produ, $data)){
      redirect('index.php/page/lista_estampas');
    }
  }else{
    $this->load->view('template/header');
      redirect('login');
  }
}




public function lista_estampas(){
      
  if($this->session->userdata('level')==='1'){
    $this->load->view('template/header');

$this->load->view('template/navbar_cadastro');
$this->load->model('ProdutoModel', 'model');
$data['tabela'] = $this->model->gera_tabela_estampas();
$this->load->view('common/table_estampas.php', $data); 

$this->load->view('template/footer');
$this->load->view('template/rodape');

}else{
$this->load->view('template/header');
redirect('login');
}

}



public function editar_estampa($id){
  
  if($this->session->userdata('level')>'0'){ 
        $this->load->view('template/header');

  $this->load->view('template/navbar');

 $this->load->model('ProdutoModel', 'model');

 $data['estado'] = $this->input->post('estado');
    
    $data['user'] = $this->model->read_est($id);
    $this->load->view('ver/edita_estampa', $data);
    $this->model->edita_estampa($id);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}



public function cadastrar_favorito(){
  if($this->session->userdata('level')>'0'){
    $data['idcara'] = $this->input->post('idcara');
    $data['idproduto'] = $this->input->post('idproduto');
    $data['nomeproduto'] = $this->input->post('nomeproduto');
    $data['precoproduto'] = $this->input->post('precoproduto');
    $data['titulo_img'] = $this->input->post('titulo_img');
    $data['linkprod'] = $this->input->post('linkprod');

    $fav['favoritados'] = $this->input->post('favoritados');
    $id = $data['idproduto'];

  //  $fav['favoritados'] = $this->input->post('favoritados');
   // $id = $this->input->post('idproduto');

    $this->load->view('template/header');

    if ($this->db->insert('favoritos', $data)){

      $this->load->model('ProdutoModel', 'model');
      $this->model->edita_produtofav($id, $fav);

      header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));
          }
    }else{
    $this->load->view('template/header');
    redirect('login');
  }
}


public function cadastrar_pedido(){
  if($this->session->userdata('level')>'0'){
    $data['idcliente'] = $this->input->post('idcliente');
    $data['nomecliente'] = $this->input->post('nomecliente');
    $data['email'] = $this->input->post('email');
    $data['telefone'] = $this->input->post('telefone');
    $data['endereco'] = $this->input->post('endereco');
    $data['complemento'] = $this->input->post('complemento');
    $data['bairro'] = $this->input->post('bairro');
    $data['cidade'] = $this->input->post('cidade');
    $data['cep'] = $this->input->post('cep');
    $data['cpf'] = $this->input->post('cpf');
    $data['numerocasa'] = $this->input->post('numerocasa');



    $data['produtos'] = $this->input->post('produtos');
    $data['quantidades'] = $this->input->post('quantidades');
    $data['valores'] = $this->input->post('valores');
    $data['estampas'] = $this->input->post('estampas');
    $data['links'] = $this->input->post('links');
    $data['images'] = $this->input->post('images');
    $data['tamanhos'] = $this->input->post('tamanhos');

    $data['desconto'] = $this->input->post('desconto');
    $data['frete'] = $this->input->post('frete');
    $data['valortotal'] = $this->input->post('valortotal');
    $data['parcelas'] = $this->input->post('parcelas');
    $data['etapa'] = $this->input->post('etapa');
    $data['etapaloja'] = $this->input->post('etapaloja');

    $data['motivo'] = $this->input->post('motivo');
    $data['motivocli'] = $this->input->post('motivocli');
    $data['data'] = $this->input->post('data');


    $data['veiculoentrega'] = $this->input->post('veiculoentrega');
    
    $data['datapago'] = $this->input->post('datapago');


        $this->load->view('template/header');

    $this->load->view('template/navbar');

    if ($this->db->insert('pedido', $data)){
      redirect('loja/deleta_todo/'.$this->session->userdata('id').'');
    }
  }else{
    $this->load->view('template/header');
    redirect('login');
  }
}


public function cadastrar_mensagem(){

  $this->load->model('MensagemModel', 'model');
  $data['nomecara'] = $this->input->post('nomecara');
  $data['idcara'] = $this->input->post('idcara');
  $data['estado'] = $this->input->post('estado');
  $data['referencia'] = $this->input->post('referencia');
  $data['nomereferencia'] = $this->input->post('nomereferencia');
  $data['valor'] = $this->input->post('valor');

    $data['nome'] = $this->input->post('nome');
    $data['email'] = $this->input->post('email');
    $data['assunto'] = $this->input->post('assunto');
    $data['mensagem'] = $this->input->post('mensagem');
    $this->load->view('template/navbar_cadastro');
    $this->load->view('template/header');

    if ($this->model->insere_msg($data)){
      redirect('/page/mensagens');
    }else{
    $this->load->view('template/header');
    redirect('login');
  }

}


  
public function ver_msg($id){
  
  $this->load->view('template/header');
  
  $this->load->model('CarrinhoModel', 'carrinho');
  $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
  $this->load->view('template/navbar', $data);


  $this->load->model('MensagemModel', 'model');
  $data['est'] = $this->model->read($id);
  $this->load->view('ver/view_estilista', $data);

}





public function lista_pagos(){
      
      if($this->session->userdata('level')==='1'){
            $this->load->view('template/header');

    $this->load->view('template/navbar_cadastro');
    $this->load->model('UserModel', 'model');
    $data['tabela'] = $this->model->gera_tabela();
    $this->load->view('common/table.php', $data); 
    $this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function lista_carrousel(){
      
      if($this->session->userdata('level')==='1'){
            $this->load->view('template/header');

    $this->load->view('template/navbar_cadastro');
    $this->load->model('BannerModel', 'carrousel');
    $data['tabela_carrousel'] = $this->carrousel->tabela_carrousel();
    $this->load->view('common/table_carrousel.php', $data);
    $this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function lista_favoritos(){
      
      if($this->session->userdata('level')>'0'){
        $this->load->view('template/header');
        $this->load->model('CarrinhoModel', 'carrinho');
        $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
        $this->load->view('template/navbar', $data);
    $this->load->model('FavoritoModel', 'model');
    $data['tabela'] = $this->model->gera_tabela();
    $this->load->view('common/table_favoritos.php', $data); 
   
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function lista_queridinhos(){
      
      if($this->session->userdata('level')>'0'){
            $this->load->view('template/header');

    $this->load->view('template/navbar');
    $this->load->model('GeraModel', 'model');
    
    $data['ver_produtos'] = $this->model->gera_tabela_queridinhos();
    $this->load->view('ver/queridinhos.php', $data);

    $this->load->view('template/footer');
    $this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function lista(){
      
      if($this->session->userdata('level')==='1'){
            $this->load->view('template/header');

    $this->load->view('template/navbar_cadastro');
    $this->load->model('UserModel', 'model');
    $data['tabela'] = $this->model->gera_tabela();
    $this->load->view('common/table.php', $data); 
  
$this->load->view('template/footer');
$this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

// DELETAR DEPOS vv


   
public function mensagens(){
  if($this->session->userdata('level')>'0'){
      $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);

  $this->load->model('MensagemModel', 'model');
  $data['tabela_mensagens'] = $this->model->gera_tabela();
  $this->load->view('common/table_mensagens.php', $data);
 
$this->load->view('template/footer');
$this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  redirect('login');
}


  }  

  
public function lista_produtos(){
  if($this->session->userdata('level')==='1'){
      $this->load->view('template/header');

  $this->load->view('template/navbar_cadastro');
  $this->load->model('ProdutoModel', 'model');
  $data['tabela_produtos'] = $this->model->gera_tabela();
  $this->load->view('common/table_produtos.php', $data);
 
$this->load->view('template/footer');
$this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
    redirect('login');
}

  }

public function lista_car(){
  if($this->session->userdata('level')>'0'){
      $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);

  $this->load->view('template/header');
  $this->load->model('CarrinhoModel', 'model');
  $data['tabela_carrinho'] = $this->model->gera_tabela_carrito();
  $this->load->view('common/table_carrinho.php', $data);
  $this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
    redirect('login');
}

  }

public function lista_pedidos(){
  if($this->session->userdata('level')>'0'){
      $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);

  $this->load->model('PedidoModel', 'model');
  $data['tabela_pedidos'] = $this->model->gera_tabela_pedidos();
  $this->load->view('common/table_pedidos.php', $data);
  
$this->load->view('template/footer');
$this->load->view('template/rodape');

}else{
  $this->load->view('template/header');
  echo $this->session->set_flashdata('msg','O Email ou Senha estão Incorretos.');
  
}

  }
  

public function editar_car($id){
  if($this->session->userdata('level')>'0'){
        $this->load->view('template/header');

    $this->load->view('template/navbar');

    $this->load->model('CarrinhoModel', 'model');

    $data['Qtd'] = $this->input->post('Qtd');
    
          $this->model->edita_carr($id);

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function editar_perfil($id){
  if($this->session->userdata('id')=== $id){
        $this->load->view('template/header');

    $this->load->view('template/navbar');

 $this->load->model('UserModel', 'model');

    $this->load->helper('file');
    
    $this->load->model('PaisagemModel', 'paisagem');
    $data['imagens'] = $this->paisagem->salva();

   
    $data['senha'] = md5($this->input->post('senha'));
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_cadastro', $data);
    $this->model->edita_perfil($id);
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function etapa1($id){
  if($this->session->userdata('id')=== $id){
    $this->load->view('template/header');

 $this->load->model('UserModel', 'model');

    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_etapa1', $data);
    $this->model->edita_etapa1($id);
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function etapa2($id){
  if($this->session->userdata('id')=== $id){
    $this->load->view('template/header');

 $this->load->model('UserModel', 'model');

    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_etapa2', $data);
    $this->model->edita_etapa2($id);
    

    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_caretapa();
    $this->load->view('common/carrinho_conf', $data);

    

    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function etapa3($id){
  if($this->session->userdata('id')=== $id){
    $this->load->view('template/header');

 $this->load->model('UserModel', 'model');

    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_etapa3', $data);
    

    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho3'] = $this->carrinho->gera_tabela_caretapa3();
    $this->load->view('common/carrinho_conf3', $data);



    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('');
  }

}



public function ver_pedido($id){
  
  if($this->session->userdata('level')>'0'){ 
        $this->load->view('template/header');

  $this->load->view('template/navbar');

 $this->load->model('PedidoModel', 'model');

    $data['ped'] = $this->model->read($id);
    $this->load->view('ver/view_pedido', $data);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function editar_pedido($id){
  
  if($this->session->userdata('level')>'0'){ 
        $this->load->view('template/header');

  $this->load->view('template/navbar');

 $this->load->model('PedidoModel', 'model');

 $data['etapa'] = $this->input->post('etapa');
 $data['etapaloja'] = $this->input->post('etapaloja');
 $data['motivo'] = $this->input->post('motivo');
 $data['motivocli'] = $this->input->post('motivocli');


    $data['ped'] = $this->model->read($id);
    $this->load->view('ver/edita_pedido', $data);
    $this->model->edita_pedido($id);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}



public function editar_msg($id){
  
  if($this->session->userdata('level')>'0'){ 

        $this->load->view('template/header');

  $this->load->view('template/navbar');


 $this->load->model('MensagemModel', 'model');

 $data['estadoadm'] = $this->input->post('estadoadm');
 $data['estado'] = $this->input->post('estado');
 $data['valor'] = $this->input->post('valor');
 $data['data'] = $this->input->post('data');
 $data['motivo'] = $this->input->post('motivo');
 $data['motivocli'] = $this->input->post('motivocli');
 $data['destino'] = $this->input->post('destino');
 $data['veiculoentrega'] = $this->input->post('veiculoentrega');
 $data['cidade'] = $this->input->post('cidade');
 $data['bairro'] = $this->input->post('bairro');
 $data['rua'] = $this->input->post('rua');
 $data['ncasa'] = $this->input->post('ncasa');
    
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_pedido_est', $data);
    $this->model->edita_mensagem($id);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}




public function editar($id){
  if($this->session->userdata('level')==='1'){
        $this->load->view('template/header');

    $this->load->view('template/navbar_cadastro');
    $this->load->model('UserModel', 'model');



    $this->load->helper('file');
    
    $this->load->model('PaisagemModel', 'paisagem');
    $data['imagens'] = $this->paisagem->salva();
    
    $data['senha'] = md5($this->input->post('senha'));
    $data['titulo_img'] = $this->model->read($id);
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_cadastro', $data);
    $this->model->edita_usuario($id);
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}


public function deletar($id){
  if($this->session->userdata('level')==='1'){
  $this->load->model('UserModel', 'model');
  $this->model->deletar($id);
  redirect('page/lista');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function deletando($id){
  if($this->session->userdata('level')>'0'){
  $this->load->model('MensagemModel', 'model');
  $this->model->deleta_msg($id);
  redirect('page/mensagens');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function deletando_pedido($id){
  if($this->session->userdata('level')>'0'){
  $this->load->model('PedidoModel', 'model');
  $this->model->deleta_ped($id);
  redirect('page/lista_pedidos');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function deletar_carrousel($id){
  if($this->session->userdata('level')==='1'){
  $this->load->model('BannerModel', 'model');
  $this->model->deleta_carrouls($id);
  redirect('page/lista_carrousel');

}else{
  $this->load->view('template/header');
  redirect('login');
}

}

public function deletar_favorito(){
  if($this->session->userdata('level')>'0'){


$everson['idproduto'] = $this->input->post('idproduto');
$everson['id'] = $this->input->post('id');

$id = $everson['id'];
    
      
      
  
   
  
        $this->load->model('ProdutoModel', 'prod');
        
        $data['favoritados'] = $this->input->post('favoritados');
      $cleiton = $everson['idproduto'] ;
        $this->prod->edita_produtofavdel($cleiton, $data);
  
    



  $this->load->model('FavoritoModel', 'model');
  $this->model->deleta_fav($id);
  
  header(sprintf('location: %s', $_SERVER['HTTP_REFERER']));

}else{
  $this->load->view('template/header');
  redirect('login');
}
}


public function senha(){
    $this->load->view('template/header');
    $this->load->view('template/navbar');
    $this->load->view('ver/senha');
}

public function redefinir_senha(){
    $this->load->view('template/header');
    $this->load->view('template/navbar');
    $this->load->view('ver/redefinir_senha');
}






}
