<!-- Reply section (logged in user) -->
<?php
include_once APPPATH.'controllers/Login.php';
?>
 
       
<style>
.number-input input[type="number"] {
-webkit-appearance: textfield;
-moz-appearance: textfield;
appearance: textfield;
}

.number-input input[type=number]::-webkit-inner-spin-button,
.number-input input[type=number]::-webkit-outer-spin-button {
-webkit-appearance: none;
}

.number-input {
  display: flex;
  justify-content: space-around;
  align-items: center;
}

.number-input button {
-webkit-appearance: none;
background-color: transparent;
border: none;
align-items: center;
justify-content: center;
cursor: pointer;
margin: 0;
position: relative;
}

.number-input button:before,
.number-input button:after {
display: inline-block;
position: absolute;
content: '';
height: 2px;
transform: translate(-50%, -50%);
}

.number-input button.plus:after {
transform: translate(-50%, -50%) rotate(90deg);
}

.number-input input[type=number] {
text-align: center;
}

.number-input.number-input {
border: 1px solid #ced4da;
width: 10rem;
border-radius: .25rem;
}

.number-input.number-input button {
width: 2.6rem;
height: .7rem;
}

.number-input.number-input button.minus {
padding-left: 10px;
}

.number-input.number-input button:before,
.number-input.number-input button:after {
width: .7rem;
background-color: #495057;
}

.number-input.number-input input[type=number] {
max-width: 4rem;
padding: .5rem;
border: 1px solid #ced4da;
border-width: 0 1px;
font-size: 1rem;
height: 2rem;
color: #495057;
}

@media not all and (min-resolution:.001dpcm) {
@supports (-webkit-appearance: none) and (stroke-color:transparent) {

.number-input.def-number-input.safari_only button:before,
.number-input.def-number-input.safari_only button:after {
margin-top: -.3rem;
}
}
}
</style>



    <div class="container">
	<div class="row">

			
<div class="col-md-5" style="border: 1px solid; margin-top: 50px; height: 450px;">

<img src="<?= base_url('uploads/'); ?><?= isset($user) ? $user['titulo_img'] : '' ?>.jpg" class="img-fluid
mx-auto mt-4" style=" height: 400px;"
			title="<?= isset($user) ? $user['nome'] : '' ?>" alt="Produto">
</div>
<div class="col-md-6" style="margin-top: 50px;">
	<ul>
		<li><i style="color: rgb(197, 143, 25); margin-left: -54px;" class="fas fa-star"></i></li>
		<li><i style="color: rgb(197, 143, 25);" class="fas fa-star"></i></li>
		<li><i style="color: rgb(197, 143, 25);" class="fas fa-star"></i></li>
		<li><i style="color: rgb(197, 143, 25);" class="fas fa-star"></i></li>
		<li><i style="color: gray" class="far fa-star"></i></li>
	</ul>

	<h4><?= $user['nome']; ?></h4>
	

	<p style="font-size: 24px; margin-top: -5px; font-weight: 500; display: inline-block;">R$: <?= $user['preco']; ?></p>
	<p style="display: inline-block; margin-left: 15px; font-size: 18px;">2x de <?= $user['preco'] / '2'; ?></p>

	<p>
	Compras acima de R$:200 ganham 10% de Desconto.
	</p>

   <br>


<div class="container">
 
   <form method="post" type="hidden" action="<?= base_url('index.php/loja/manda_procar') ?>" enctype="multipart/form-data" class="hidden">

  
<p class=" text-center">Tamanho:</p> 
					  <select class="browser-default custom-select" type="text" id="tamanho" name="tamanho"  required>
            
  <option value="PP">PP</option>
  <option value="P">P</option>
  <option value="M">M</option>
  <option value="G">G</option>
  <option value="GG">GG</option>
</select>

<p class="mt-1 text-center">Quantidade:</p> 
					 <div class="def-number-input number-input safari_only mx-auto">
  <i class="fas fa-minus" onclick="this.parentNode.querySelector('input[type=number]').stepDown()" class="minus"></i>
  <input class="quantity" min="0" id="Qtd" name="Qtd" name="quantity" value="1" type="number">
  <i class="fas fa-plus" onclick="this.parentNode.querySelector('input[type=number]').stepUp()" class="plus"></i>
</div>
	

   <input type="hidden" value="<?=$this->session->userdata('username');?>" type="text" class="form-control" name="nomecara" placeholder="Nome do Produto" required>
   <input type="hidden" value="<?=$this->session->userdata('id');?>" type="text" class="form-control" name="idcara" placeholder="Nome do Produto" required>
   <input type="hidden" value="<?=$this->session->userdata('email');?>" type="text" class="form-control" name="emailcara" placeholder="Nome do Produto" required>
  
   
<input value="<?= $user['nome'];?>" type="hidden" class="form-control" name="nome" placeholder="">
<input value="<?= $user['preco'];?>" type="hidden" class="form-control" name="preco" placeholder="">
<input value="<?=base_url('index.php/loja/ver_produto/');?><?= $user['id'];?>" type="hidden" class="form-control" name="linkprod" placeholder="">

<input type="hidden" value="<?= $user['titulo_img'];?>" name="image" id="image" placeholder="Titulo da imagem" class="form-control mb-4" />
    
</div>







	
<?php if($user['visao']==="2"){ ?>
	<button class="btn btn-warning btn-lg" type="submit" style="margin-top: 15px; width: 100%;" disabled>(indisponivel no momento) <i class="fas fa-cart-plus"></i></button>



  
<?php }else{ ?>
	<button class="btn btn-warning btn-lg" type="submit" style="margin-top: 15px; width: 100%;">Adicionar ao carrinho <i class="fas fa-cart-plus"></i></button>

<div class="text-center">
	<a class="btn btn-warning btn-lg" data-toggle="modal" data-target="#modalContactForm"
	 style="margin-top: 15px; width: 82%; margin-left: 15px;">Personalizar com Estilista <i class="fas fa-palette"></i></a>
</div>

<?php } ?>

  


</div>


</div>
</div>
</div>


<input type="" class="custom-control-input" value="Estampa Padrão" id="customControlValidation1" name="estampa">


<div class="container">

<div class="row">

<div class="col-md-7" style="margin-left: 0px; border: 1px solid; margin-top: 50px; padding: 15px 15px;">
<p class="h5 text-success"><i class="fas fa-icons"></i> Estampas Personalizadas</p> (clique na imagem para ver melhor):
<hr>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home"
      aria-selected="true">Animes & HQs</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile"
      aria-selected="false">Filmes</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact"
      aria-selected="false">Séries</a>
  </li>
</ul>



<div class="tab-content" id="myTabContent">
  
<?= $tabela?>  

</div>
</div>
</div></div>

<div class="container">
<div class="row">
<div class="col-md-6">


	<p style="margin-top: 50px; color: rgb(97, 96, 96);">
  Descrição do produto: <?= $user['descricao']?>


  
</div>
</div>
</div></form>

<div class="container col-xm-8">
<div class="row" >
<div class="col-6 col-xm-10" style="width: 100%; height: 50px; background-color: gray; margin-left: 15px; border-radius: 5px; padding: 10px; ">
	<h3 style="color: white; display: inline-block;">Tamanho</h3>
	<button onclick="exibir()" style="border: none; outline: none; background-color: transparent; color: white;"><i style="margin-left: 400px; font-size: 24px;" class="fas fa-caret-down"></i></button>
</div>
</div>
<div class="row">
<div class="col-md-6 tamans" id="tamans" style="border: 1px solid; margin-left: 15px; padding: 15px; border-radius: 5px;">
	<p style="font-size: 24px; border-bottom: 1px solid;;">PP</p>
	<p style="font-size: 24px; border-bottom: 1px solid;;">P</p>
	<p style="font-size: 24px; border-bottom: 1px solid;;">M</p>
	<p style="font-size: 24px; border-bottom: 1px solid;;">G</p>
	<p style="font-size: 24px; border-bottom: 1px solid;;">GG</p>
</div>
</div>
    </div>
</form>









	<div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Contatando Nosso Estilista</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

	  <form method="POST" action="<?=base_url("index.php/page/cadastrar_mensagem");?>">

      <div class="modal-body mx-1">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i> 
          <label data-error="wrong" data-success="right" for="form34">Seu nome</label>
          <input type="text" name="nome" id="form34" class="form-control validate" required>
          
          <i class="fas fa-envelope prefix grey-text"></i> 
          <label data-error="wrong" data-success="right" for="form29">Seu email</label>
          <input type="email" name="email" id="form29" class="form-control validate" required>
          
        </div>

        <div class="md-form mb-2">
        <i class="fas fa-envelope-open-text"></i>
          <label data-error="wrong" data-success="right" for="form29">Titulo</label>
          <input type="text" name="assunto" id="form29" class="form-control validate" required>
          
        </div>

        <div class="md-form">
        <i class="fas fa-comment-alt"></i>
           <label data-error="wrong" data-success="right" for="form8">Sua mensagem</label>
          <textarea type="text" name="mensagem" id="form8" class="md-textarea form-control" rows="4" required></textarea>
         
        </div>

        <input type="hidden" name="nomecara" value="<?= $this->session->userdata('username');?>" id="form34" class="form-control validate">
        <input type="hidden" name="idcara" value="<?= $this->session->userdata('id');?>" id="form34" class="form-control validate">
        <input type="hidden" name="estado" value='<i class="fas fa-envelope text-success">Pedido enviado</i>' id="form34" class="form-control validate">
        <input type="hidden" name="referencia" value="<?=base_url('index.php/loja/ver_produto/')?><?= $user['id']; ?>" id="form34" class="form-control validate">
        <input type="hidden" name="nomereferencia" value="<?= $user['nome']; ?>" id="form34" class="form-control validate">
        <input type="hidden" name="valor" value="" id="form34" class="form-control validate">



      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-unique">Send <i class="fas fa-paper-plane-o ml-1"></i></button>
      </div>
    </div>

	</form>
  </div>
</div>
