<!-- Reply section (logged in user) -->
<?php
include_once APPPATH.'controllers/Login.php';
?>
  
  </div>
  <div class="d-md-flex flex-md-fill px-1">
   

<div class="container mt-3"><br/><br/>
    <div class="row text-center">


   <?php if($this->session->userdata('level')==='1'){ ?>


  

    <div class="container mt-3 mx-auto"><h1>Gerenciar pedido do Cliente</h1>
    
     <?=
    '<div class="mt-1">Cliente: '.
    $user['nomecara'].'</div>';
    ?>
      <?=
      '<div class="mt-1">Titulo do pedido: '.
    $user['assunto'].'</div>';
    ?>
      <?=
      '<div class="mt-1">Descrição: '.
     $user['mensagem'].'</div>';
    ?>
      <?=
      '<div class="mt-1">Valor atual: '.
     $user['valor'].'</div>';
    ?>
   
    
    </div>
   
<?php if($user['valor']<'0'){ ?>



        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Aprovar pagamento <i class="fas fa-clipboard-check text-success"></i></p>
               

<input value="<?= isset($user) ? $user['valor'] : '' ?>" type="number" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="far fa-credit-card text-warning"> Aguardando o pagamento</i>' type="text" class="form-control" name="estadoadm" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input type="hidden" class="form-control" value="<?= isset($user) ? $user['motivo'] : '' ?>" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>
<?php } ?>

        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



                <p class="h4 mb-4">Negar Pedido <i class="fas fa-ban text-danger"></i></p>
               

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-ban text-danger"> Pedido Negado</i>' type="text" class="form-control" name="estadoadm" placeholder="Etapa pedido">

<input class="form-control" value="" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">

<input type="hidden" class="form-control" value="<?= date("Y-m-d") ?>" name="data">

                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>
        <div class="col-md-6 mx-auto text-center">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



                <p class="h4 mb-4">Produto a caminho <i class="fas fa-car-side text-success"></i></p>
               

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" type="" value='<i class="fas fa-car-side text-sucess"> Produto a caminho</i>' type="text" class="form-control" name="estadoadm" placeholder="Etapa pedido">

<input class="form-control pl-3 pt-3" value="" name="local" placeholder="Você pode atualizar a localização do produto aqui.">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input type="hidden" class="form-control" value="<?= isset($user) ? $user['motivo'] : '' ?>" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">



                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>


        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



                <p class="h4 mb-4">Produto entregue <i class="fas fa-clipboard-check text-success"></i></p>

<input type="" class="form-control" value="Rua:<?= $user['rua'] ?> N.<?= $user['ncasa'] ?>" name="destino" placeholder="Local entregado..."> 

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-clipboard-check text-success"> Produto entregue</i>' type="text" class="form-control" name="estadoadm" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input type="hidden" class="form-control" value="<?= isset($user) ? $user['motivo'] : '' ?>" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>
       

        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



                <p class="h4 mb-4">Destinatário ausente <i class="fas fa-frown text-danger"></i></p>
               

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-frown text-danger"> Destinatário não encontrado</i>' type="text" class="form-control" name="estadoadm" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input class="form-control" value="" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>




        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Reembolsar cliente <i class="fas fa-hand-holding-usd text-success"></i></p>
               

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-hand-holding-usd text-success"> Cliente reembolsado</i>' type="text" class="form-control" name="estadoadm" placeholder="Etapa pedido">

<input  type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input type="" class="form-control" value="" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>



   <?php }if($this->session->userdata('id')===$user['idcara']){ ?>
                  
                <div class="container mt-3 mx-auto"><h1>Gerenciar meu pedido</h1></div>

    <?php if($user['estadoadm']==='<i class="far fa-credit-card text-warning"> Aguardando o pagamento</i>'){ ?>
    <div class="col-md-12 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Pagar produto <i class="fas fa-clipboard-check text-success"></i></p>

<hr>
<h2>Produto:</h2> <br>

<h3>Titulo: <?=$user['assunto']?></h3>
<h4>Descrição: <?=$user['mensagem']?></h4>
<h4>Valor: <?=$user['valor']?></h4>
<hr>

                        <div class="col-lg-6 mx-auto">
                            <label for="numeroCartao" class="nInput">Estado</label>
                            <input id="numeroCartao" type="text" class="stInput" name="estadoenvio"
                                autocomplete="cc-number" maxlength="50"
                                 required>
                        </div>
                        
                        <div class="col-lg-6 mx-auto">
                            <label for="numeroCartao" class="nInput">Cidade</label>
                            <input id="numeroCartao" type="text" class="stInput" name="cidade"
                                autocomplete="cc-number" maxlength="200"
                                 required>
                        </div>

                        <div class="col-lg-6 mx-auto">
                            <label for="numeroCartao" class="nInput">Bairro</label>
                            <input id="numeroCartao" type="text" class="stInput" name="bairro"
                                autocomplete="cc-number" maxlength="200"
                                 required>
                        </div>

                        <div class="col-lg-6 mx-auto">
                            <label for="numeroCartao" class="nInput">Rua</label>
                            <input id="numeroCartao" type="text" class="stInput" name="rua"
                                autocomplete="cc-number" maxlength="200"
                                 required>
                        </div>

                        <div class="col-lg-6 mx-auto">
                            <label for="numeroCartao" class="nInput">Numero da casa</label>
                            <input id="numeroCartao" type="number" class="stInput" name="ncasa"
                                autocomplete="cc-number" maxlength="50"
                                 required>
                        </div>





<div class="custom-control custom-radio mb-5 mt-5">
<input type="radio" class="custom-control-input" value="DLOG" id="customControlValidation2" name="veiculoentrega"  checked>
<label class="custom-control-label" for="customControlValidation2">DLOG</label>
    <p style="margin-top: 15px">3 Dia(s) úteis</p>
    <p style="margin-top: 15px">R$ 5,00</p>
</div>



<div class="custom-control custom-radio">
<input type="radio" class="custom-control-input" value="SEDEX" id="customControlValidation3" name="veiculoentrega">
<label class="custom-control-label" for="customControlValidation3">SEDEX</label>
    <p style="margin-top: 15px">3 Dia(s) úteis</p>
    <p style="margin-top: 15px">R$ 15,00</p>
</div>



<hr>
 <div class="row mt-1">

 <div class="container col-sm-12">
                    <img class="mx-auto d-block"
            style="height: 220px;" src="<?=base_url('assets/images/IMG5.png')?>"
           alt="Imagem User">
                    
                    </div>


                        <div class="col-lg-6">
                            <label for="numeroCartao" class="nInput">Número</label>
                            <input id="numeroCartao" type="tel" class="stInput" inputmode="numeric"
                                pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19"
                                placeholder="xxxx xxxx xxxx xxxx" required>
                        </div>
                        <div class="col-lg-6">
                            <label for="nome" class="nInput">Nome</label>
                            <input name="nome" class="stInput" type="text" required>
                        </div>
                        <div class="col-sm-6" style="display: inline-block;">
                            <label for="validade" class="nInput">Data</label>
                            <input name="validade" class="stInput" maxlength="7" placeholder="MM / YY" type="number" required>
                        </div>
                        <div class="col-sm-6" style="display: inline-block;">
                            <label for="CVV" class="nInput">CVV</label>
                            <input name="CVV" class="stInput" maxlength="4" type="number" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="parcelas" class="nInput">Parcelar em</label>
                            <input class="stInput" list="parcelas" name="parcelas" required>
                            <datalist id="parcelas">
                                    <option value="Parcelar em 1x">
                                    <option value="Parcelar em 2x">
                                    <option value="Parcelar em 3x">
                                    <option value="Parcelar em 4x">
                                    <option value="Parcelar em 5x">
                                    <option value="Parcelar em 6x">
                                    <option value="Parcelar em 7x">
                                    <option value="Parcelar em 8x">
                                    <option value="Parcelar em 9x">
                                    <option value="Parcelar em 10x">
                                    <option value="Parcelar em 11x">
                                    <option value="Parcelar em 12x">
                            </datalist>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-secondary btn-lg" style="width: 100%; margin-top: 25px;"><i class="fas fa-credit-card"></i> Pagar com cartão</button>
                        </div>











<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-credit-card text-success"> Pagamento realizado</i>' type="text" class="form-control" name="estado" placeholder="Etapa pedido">

<input  type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">


            </form>
        </div>
        </div>



    <?php } ?>



    <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Produto recebido <i class="fas fa-clipboard-check text-success"></i></p>
               

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-user-check text-success"> Produto recebido</i>' type="text" class="form-control" name="estado" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d ") ?>" name="data">

<input type="" class="form-control" value="" name="motivocli" placeholder="Digite sua avaliação se quiser, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>


    <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Pedir Reembolso <i class="fas fa-dollar-sign text-danger"></i></p>
               

<input type="hidden" value="<?= isset($user) ? $user['valor'] : '' ?>" type="text" class="form-control" name="valor" placeholder="Valor ex: 20.90 (ultilize o ponto para separar os reais dos centavos)">

<input type="hidden" value='<i class="fas fa-dollar-sign text-danger"> Reembolso pedido</i>' type="text" class="form-control" name="estado" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d H:i") ?>" name="data">

<input type="" class="form-control" value="" name="motivocli" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>




   <?php } ?>
    </div>
</div>
</section>