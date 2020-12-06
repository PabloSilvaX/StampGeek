<!-- Reply section (logged in user) -->
<?php
include_once APPPATH.'controllers/Login.php';
?>
 


<section class="ftco-animate">
<div class="container mt-5"><br/><br/>
    <div class="row text-center">

        <div class="col-md-12 col-12 mx-auto text-center">
         
        <div class="text-center mt-5">
              <a href="<?= base_url('index.php/page/blog'); ?>">  <i class="fas fa-long-arrow-alt-left fa-3x"></i></a>
                <br>
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
             <!--action="<?= base_url() ?>index.php/page/cadastrar_post" -->
 


               
                <div class="text-center">
          
            <img 
             src="<?= base_url(); ?>uploads/<?= isset($user) ? $user['titulo_img'] : '' ?>.jpg" 
            class="img-fluid ">
           
</div>
<div class="container mx-auto mt-5">

<h2 class="text-warning ml-2 mb-4"><?= isset($user) ? $user['titulo_postagem'] : '' ?></h2>
<?= isset($user) ? $user['texto'] : '' ?>
</div>

</form>
        </div>
       
    
</div>
</section>