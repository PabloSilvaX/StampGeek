
<section class="section ftco-animate pb-3 text-center pt-5 mt-4">
<h1 class="section-heading h1 pt-4">Seu Perfil</h1>
<p class="section-description">Você pode alterar algumas informações sobre você abaixo.</p>
<div class="row mx-auto">
    <div class="mx-auto staff col-md-7 mb-4">
     
        
        <div class="view overlay zoom mx-auto text-center">
        <br>
        <a href="<?= base_url('index.php/page/editar_perfil/'); ?><?= isset($user) ? $user['id'] : '' ?>">
        <img src="<?= base_url(); ?>uploads/<?= isset($user) ? $user['titulo_img'] : '' ?>.jpg"
            alt="avatar mx-auto white" class="rounded-circle mx-auto text-center img-fluid">
        <br>
            <div class="mask flex-center rgba-grey-light">
            <p class="white-text"><i class="fas fa-user-edit text-warning"></i></p>   
             </div></a>
          </div>
        
        <div class="staff mx-auto text-center">
          <h4 class="card-title mt-1">
        <div class="md-form">
        <h1>
        <?= isset($user) ? $user['nome'] : '' ?>
        </h1>
        <hr>
        <div class="container">
        <h4 class="text-info">
        <i class="far fa-envelope"></i> Email: </h4>
          <h4 class="text-warning"> <?= isset($user) ? $user['email'] : '' ?></h4><br>
          </div>
          <div class="container">
        <h4 class="text-info">
        <i class="fas fa-mobile-alt"></i> Telefone: </h4>
            <h4 class="text-warning"><?= isset($user) ? $user['telefone'] : '' ?></h4><br>
          </div>
          <a href="<?= base_url('index.php/page/editar_perfil/'); ?><?= isset($user) ? $user['id'] : '' ?>" >
          <button type="button" class="btn btn-cyan"><i class="far fa-edit"></i> Editar Perfil</button>
          </a>
         
         
        </div>
      </div>
    </div>
  </div>