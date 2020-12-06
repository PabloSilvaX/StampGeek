<!-- Reply section (logged in user) -->
<?php
include_once APPPATH.'controllers/Login.php';
?>
  
  </div>
  <div class="d-md-flex flex-md-fill px-1">
   

<div class="container mt-3 mx-auto text-center"><br/><br/>


    
   <hr> <?php if($this->session->userdata('level')==='1'){ ?>
   
   <h1 class="mt-5 mx-auto">Gerenciar pedido do Cliente:</h1>


 <div class="row">


<div class="col-md-6 mx-auto text-center mt-3">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Produtos a caminho <i class="fas fa-car-side text-success"></i></p>
               

<input type="hidden" type="" value='<i class="fas fa-car-side text-sucess"> Produtos a caminho</i>' type="text" class="form-control" name="etapaloja" placeholder="Etapa pedido">

<input class="form-control pl-3 pt-3" value="" name="motivo" placeholder="Você pode atualizar a localização do produto aqui.">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">



                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>


        <div class="col-md-6 mx-auto text-center mt-3">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



                <p class="h4 mb-4">Produto entregue <i class="fas fa-clipboard-check text-success"></i></p>

<input type="" class="form-control" value="Endereço entregue:<?= $ped['endereco'] ?> N.<?= $ped['numerocasa'] ?>" name="motivo" placeholder="Local entregado..."> 

<input type="hidden" value='<i class="fas fa-clipboard-check text-success"> Produto entregue <?= date("Y-m-d ") ?></i>' type="text" class="form-control" name="etapaloja" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>
       

        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



                <p class="h4 mb-4">Destinatário ausente <i class="fas fa-frown text-danger"></i></p>
               

<input type="hidden" value='<i class="fas fa-frown text-danger"> Destinatário não encontrado</i>' type="text" class="form-control" name="etapaloja" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input class="form-control" value="" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>




        <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Reembolsar cliente <i class="fas fa-hand-holding-usd text-success"></i></p>
               

<input type="hidden" value='<i class="fas fa-hand-holding-usd text-success"> Cliente reembolsado <?= date("Y-m-d ") ?></i>' type="text" class="form-control" name="etapaloja" placeholder="Etapa pedido">

<input  type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d") ?>" name="data">

<input type="" class="form-control" value="" name="motivo" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>

   <?php } ?>

        <?php if($this->session->userdata('id')===$ped['idcliente']){ ?>
           
                <div class="container mt-3 mx-auto text-center"><h1>Gerenciar meu pedido</h1></div>


    <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4 mt-3">Produto recebido <i class="fas fa-clipboard-check text-success"></i></p>
               

<input type="hidden" value='<i class="fas fa-user-check text-success"> Produto recebido</i>' type="text" class="form-control" name="etapa" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d ") ?>" name="data">

<input type="" class="form-control" value="" name="motivocli" placeholder="Digite sua avaliação se quiser, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>


    <div class="col-md-6 mx-auto text-center mt-2">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 


                <p class="h4 mb-4">Pedir Reembolso <i class="fas fa-dollar-sign text-danger"></i></p>
               

<input type="hidden" value='<i class="fas fa-dollar-sign text-danger"> Reembolso pedido</i>' type="text" class="form-control" name="etapa" placeholder="Etapa pedido">

<input type="hidden" class="form-control pl-3 pt-3" value="<?= date("Y-m-d H:i") ?>" name="data">

<input type="" class="form-control" value="" name="motivocli" placeholder="Digite o motivo, max 200 Caracteres.">


                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>

        <?php } ?>

</div>
      
    </div>
    </div>
</div>
</section>