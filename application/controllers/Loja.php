<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Loja extends CI_Controller{


  public function index(){
    $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);

    $this->load->view('ver/setores.php');
    
    $this->load->model('BannerModel', 'carrousel');
    $data['tabela_carrousel'] = $this->carrousel->gera_carrousel();
    $this->load->view('ver/carrousel_index.php', $data);

    $this->load->model('GeraModel', 'model');
    
    $data['ver_produtos'] = $this->model->gera_tabela_queridinhos();
    $this->load->view('ver/queridinhos.php', $data);



    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');
  }


  public function quemsomos(){
    $this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);

    $this->load->view('ver/welcome.php');
    
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');
  }

  public function produtos($setor){
    
		$this->load->view('template/header');
    $this->load->model('CarrinhoModel', 'carrinho');
    $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
    $this->load->view('template/navbar', $data);
    $this->load->view('ver/setores.php');

    $this->load->model('GeraModel', 'model');

    $data['ver_produtos'] = $this->model->gera_tabela_produtos($setor);
    $this->load->view('common/view_produtos.php', $data); 

    $this->load->view('template/footer');
    $this->load->view('template/rodape');
  }

   
public function cadastrar_produto(){
  if($this->session->userdata('level')==='1'){
    $this->load->helper('file');

    $this->load->model('PaisagemModel', 'paisagem');

   $data['imagens'] = $this->paisagem->salva();

   
    $this->load->model('ProdutoModel', 'model');

  $produ['nome'] = $this->input->post('nome');
  $produ['titulo_img'] = $this->input->post('titulo_img');
  $produ['preco'] = $this->input->post('preco');
  $produ['descricao'] = $this->input->post('descricao');
  $produ['categoria'] = $this->input->post('categoria');
  
  $produ['favoritados'] = $this->input->post('favoritados');
  $produ['visao'] = $this->input->post('visao');
  
    $this->load->view('template/navbar_cadastro');
    $this->load->view('template/header');
$this->load->view('ver/form_produto.php');

$this->load->view('template/footer');
$this->load->view('template/rodape');
    if ($this->model->insere_produ($produ, $data)){
      redirect('index.php/page/lista_produtos');
    }
  }else{
    $this->load->view('template/header');
      redirect('login');
  }
}

  
public function ver_produto($id){
  
  $this->load->view('template/header');
  
  $this->load->model('CarrinhoModel', 'carrinho');
  $data['tabela_carrinho'] = $this->carrinho->gera_tabela_car();
  $this->load->view('template/navbar', $data);


  $this->load->model('ProdutoModel', 'model');
  $this->load->view('ver/setores.php');


  $this->load->helper('file');
  
  $this->load->model('PaisagemModel', 'paisagem');
  $data['imagens'] = $this->paisagem->salva();
  $data['nome'] = $this->input->post('nome');
  $data['titulo_img'] = $this->input->post('titulo_img');

  $data['preco'] = $this->input->post('preco');
  $data['descricao'] = $this->input->post('descricao');
 
  
  $data['user'] = $this->model->read($id);
  $data['tabela'] = $this->model->gera_tabela_estampastab();
  $this->load->view('ver/view_produtos', $data);
  //$this->model->edita_post($id);


  
  $data['ver_produtos'] = $this->model->gera_tabela_produtos_v();
  $this->load->view('common/view_produtosv.php', $data);

  $this->load->view('template/footer');
  $this->load->view('template/rodape');

}



  public function manda_procar(){


    $this->load->model('CarrinhoModel', 'model');

  $cas['idcara'] = $this->input->post('idcara');
  $cas['nomecara'] = $this->input->post('nomecara');
  $cas['emailcara'] = $this->input->post('emailcara');
  $cas['nome'] = $this->input->post('nome');
  $cas['preco'] = $this->input->post('preco');
  $cas['Qtd'] = $this->input->post('Qtd');
  $cas['linkprod'] = $this->input->post('linkprod');
  $cas['tamanho'] = $this->input->post('tamanho');
  $cas['image'] = $this->input->post('image');
  $cas['estampa'] = $this->input->post('estampa');
  
  
$this->load->view('ver/view_produtos.php');

    if ($this->model->insere_car($cas)){
      redirect('');
    }
 
}



public function editar_car($id){
  if($this->session->userdata('level')==='1'){
    $this->load->view('template/navbar');
    $this->load->view('template/header');

 $this->load->model('ProdutoModel', 'model');

    $data['imagens'] = $this->paisagem->salva();
    $data['nome'] = $this->input->post('nome');
    $data['titulo_img'] = $this->input->post('titulo_img');
    $data['preco'] = $this->input->post('preco');
    $data['descricao'] = $this->input->post('descricao');
   
    
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_produto', $data);
    $this->model->edita_produto($id);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}



public function editar_produtovisao($id){
  if($this->session->userdata('level')==='1'){
    $this->load->view('template/navbar');
    $this->load->view('template/header');

 $this->load->model('ProdutoModel', 'model');

    $this->load->helper('file');
    
    $this->load->model('PaisagemModel', 'paisagem');

    $data['visao'] = $this->input->post('visao');
   
    
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_produtovisao', $data);
    $this->model->edita_produtovisao($id);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function editar_produto($id){
  if($this->session->userdata('level')==='1'){
    $this->load->view('template/navbar');
    $this->load->view('template/header');

 $this->load->model('ProdutoModel', 'model');

    $this->load->helper('file');
    
    $this->load->model('PaisagemModel', 'paisagem');
    $data['imagens'] = $this->paisagem->salva();
    $data['nome'] = $this->input->post('nome');
    $data['titulo_img'] = $this->input->post('titulo_img');
    $data['preco'] = $this->input->post('preco');
    $data['descricao'] = $this->input->post('descricao');
   
    
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_produto', $data);
    $this->model->edita_produto($id);
    
    $this->load->view('template/footer');
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function editar_banner($id){
  if($this->session->userdata('level')==='1'){
    $this->load->view('template/navbar');
    $this->load->view('template/header');

 $this->load->model('BannerModel', 'model');

    $data['titulo'] = $this->input->post('titulo');
    $data['link'] = $this->input->post('link');
   
    
    $data['user'] = $this->model->read($id);
    $this->load->view('ver/edita_banner', $data);
    $this->model->edita_banner($id);
    $this->load->view('template/rodape');

  }else{
    $this->load->view('template/header');
    redirect('login');
  }

}

public function deleta_produto($id){
  if($this->session->userdata('level')==='1'){
  $this->load->model('ProdutoModel', 'model');
  $this->model->deleta_prod($id);
  redirect('/page/lista_produtos');

}else{
  $this->load->view('template/header');
  redirect('login');
}
}   

public function deleta_estampa($id){
  if($this->session->userdata('level')==='1'){
  $this->load->model('ProdutoModel', 'model');
  $this->model->deleta_estampa($id);
  redirect('/page/lista_estampas');

}else{
  $this->load->view('template/header');
  redirect('login');
}
}   

public function deleta_car($id){
  
  $this->load->model('CarrinhoModel', 'model');
  $this->model->deleta_car($id);
  
$anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;

header("location: {$anterior}");

}   

public function deleta_todo($id){
  
  $this->load->model('CarrinhoModel', 'model');
  $this->model->deleta_geral($id);


  $this->load->view('template/header');
  $this->load->view('template/navbar');
      
      $this->load->view('ver/contato_view');

  $this->load->view('template/rodape');
  $this->load->view('template/footer');

  header("refresh: 5;../../page/lista_pedidos/");

}   


}