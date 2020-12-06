<!-- Reply section (logged in user) -->
<?php
include_once APPPATH.'controllers/Login.php';
?>
  
  </div>
  <div class="d-md-flex flex-md-fill px-1">
   

<div class="container mt-3"><br/><br/>
    <div class="row text-center">
        <div class="col-md-12 mx-auto text-center">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
 



            
  

<?php if($user['visao']==='1'){ 


echo '
               
<div class="text-center">
         <p class="h4 mb-4"><i class="fas fa-ban text-danger"></i> Esconder Produto <span class="text-danger">'.$user['nome'].'</span> ?</p>
         <p> O produto não ficara mais disponivel para compras mas ainda será exibido com a compra desativda e a mensagem "indisponivel no momento", caso deseje depois o produto poderá ficar a venda denovo.  </p>

<img 
src="';
echo base_url('uploads/');
echo isset($user) ? $user['titulo_img'] : '' ;
echo '.jpg" 
class="img-fluid ">

</div>


<input type="hidden" value="2" type="text" class="form-control" name="visao" placeholder="Nome Completo">
<button class="btn btn-info btn-block my-4" value="Salvar" type="submit">SIM, DEIXAR INDISPONIVEL PARA COMPRA!</button>
';
 } 
 if($user['visao']==='2'){
echo '           
<div class="text-center">
         <p class="h4 mb-4"><i class="far fa-check-circle text-success"></i> Exibir Produto <span class="text-success">'.$user['nome'].'</span> ?</p>
         <p> O produto voltará a ficar disponivel para compras, caso o estoque esgote por exemplo você poderá ocultar denovo depois. </p>

<img 
src="';
echo base_url('uploads/');
echo isset($user) ? $user['titulo_img'] : '' ;
echo '.jpg" 
class="img-fluid ">

</div>




<input type="hidden" value="1" type="text" class="form-control" name="visao" placeholder="">
<button class="btn btn-info btn-block my-4" value="Salvar" type="submit">SIM, DEIXAR DISPONIVEL PARA COMPRA!</button>'
;

 }?>





                
            </form>
        </div>
       
    </div>
</div>
</section>