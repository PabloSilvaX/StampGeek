<?php
include_once APPPATH.'controllers/Login.php';
?>


<div class="container col-md-6 mx-auto mt-5">
 <!-- Card Wider -->
<div class="card card-cascade wider">

<!-- Card image -->

<!-- Card content -->
<div class="card-body card-body-cascade text-center">

<h4 class="card-title"><strong>Pedido enviado: </strong></h4>

  <h5 class="blue-text pb-2"><strong> <?=$est['assunto']?></strong></h5>
  <!-- Text -->
  <p class="card-text">Descrição: <?=$est['mensagem']?> </p>

<hr>

  <!-- Title -->
  <h4 class="card-title"><strong>Informações do Pedido de :  <?=$est['nome']?>.</strong></h4>
  <p class="card-text">Nome do cliente: <?=$est['nome']?></p>
  <p class="card-text">Email do cliente: <?=$est['email']?></p>
  <p class="card-text">Data do pedido: <?=$est['created']?></p>
  <p class="card-text">Produto de referencia: <a href="<?=$est['referencia']?>"><?=$est['nomereferencia']?></a></p>
  <p class="card-text">Status pelo cliente: <?=$est['estado']?></p>
  <p class="card-text">Motivo do status do cliente: <?=$est['motivocli']?></p>
  <p class="card-text">Status da loja: <?=$est['estadoadm']?></p>
  <p class="card-text">Motivo do status da loja: <?=$est['motivo']?></p>
  <hr>
  <p class="card-text">Valor atual: <?=$est['valor']?></p>
  <p class="card-text">Veiculo de entrega: <?=$est['veiculoentrega']?></p>
  <p class="card-text">Cidade: <?=$est['cidade']?></p>
  <p class="card-text">Bairro: <?=$est['bairro']?></p>
  <p class="card-text">Rua: <?=$est['rua']?></p>
  <p class="card-text">Num. Casa: <?=$est['ncasa']?></p>



<hr>

<a href="<?=base_url('index.php/page/editar_msg/')?><?=$est['id']?>"><button type="button" class="btn btn-primary btn-rounded mr-3">Gerenciar <i class="fas fa-cog text-white"></i></button>
<a href="<?=base_url('index.php/page/deletando/')?><?=$est['id']?>"><button type="button" class="btn btn-danger btn-rounded ml-3">Deletar <i class="fas fa-trash-alt text-white"></i></button>


</div>
</div>
</div><br><br>
<!-- Card Wider -->