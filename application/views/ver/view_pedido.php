<?php
include_once APPPATH.'controllers/Login.php';
?>

<div class="container mx-auto text-center">


<hr>
<h3 class="mt-5">Dados dos Pedidos:</h3><br>
<h5>
<div class="row">
<div class="container col-6">
<?=
  '<div class="mt-1">Status Cliente: '.
 $ped['etapa'].'</div>';
?>
<?=
  '<div class="mt-1">Info Cliente: '.
  $ped['motivocli'].'</div>';
?>
</div>
<div class="container col-6">
<?=
  '<div class="mt-1">Status Loja: '.
 $ped['etapaloja'].'</div>';
?>
<?=
  '<div class="mt-1">Info Loja: '.
  $ped['motivo'].'</div>';
?>

</div>
</div>
</h5>
<hr>
<div class="row mx-auto mt-5">

<div class="col-1">
<h5>
Imagem: <br><br></h5>
<?=$ped['images']?>

</div>
<div class="col-4">
<h5>
Nome Produtos: <br><br></h5>
<?=$ped['produtos']?>

</div>


<div class="col-1">
<h5>
Link: <br><br>
</h5>
<?=$ped['links']?>
</div>


<div class="col-1"><h5>
Valores: <br><br></h5>

<?=$ped['valores']?>
</div>


<div class="col-2">
<h5>
Quantidades: <br><br></h5>
<?=$ped['quantidades']?>
</div>


<div class="col-1"><h5>
Tamanhos: <br><br></h5>
<?=$ped['tamanhos']?>
</div>


<div class="col-2 md-5">
<h5>
Estampas: <br><br></h5>
<?=$ped['estampas']?>
</div>

<h5 class="text-success mx-auto mt-5">Valor total:  R$ <?=$ped['valortotal']?></h5>

</div>



<hr>
<h3>Informações Cliente:</h3>
 <?=
'<div class="mt-1">Nome do Cliente: '.
$ped['nomecliente'].'</div>';
?>
  <?=
  '<div class="mt-1">Email do Cliente: '.
$ped['email'].'</div>';
?>
  <?=
  '<div class="mt-1">Telefone do Cliente: '.
 $ped['telefone'].'</div>';
?>
  <?=
  '<div class="mt-1">CPF do Cliente: '.
 $ped['cpf'].'</div>';
?>
<hr>


<h3>Local para envio:</h3>

  <?=
  '<div class="mt-1">Cidade: '.
 $ped['cidade'].'</div>';
?>
 
  <?=
  '<div class="mt-1">Bairro: '.
 $ped['bairro'].'</div>';
?>

  <?=
  '<div class="mt-1">Endereço: '.
 $ped['endereco'].'</div>';
?>

  <?=
  '<div class="mt-1">Complemento: '.
 $ped['complemento'].'</div>';
?>

  <?=
  '<div class="mt-1">CEP: '.
 $ped['cep'].'</div>';
?>

  <?=
  '<div class="mt-1">Entrega por: '.
 $ped['veiculoentrega'].'</div>';
?>
<hr>

    </div>
    </div>