
      <div class="container">
       <div class="col-md-4 mx-auto col-md-offset-4 mt-5"><br><br><br><br><br>
         <form class="form-signin" action="<?php echo site_url('login/auth');?>" method="post">
           <h2 class="form-signin-heading text-center">Faça login</h2>
           <p class="text-center text-danger"><?php echo $this->session->flashdata('msg');?></p>
           <label for="username" class="sr-only">Username</label>
           <input type="email" name="email" class="form-control" placeholder="Email" maxlength="256" required autofocus>
           <label for="password" class="sr-only">Password</label>
           <input type="password" name="password" class="form-control mt-3" placeholder="Senha" maxlength="50" required><br>
           <div class="checkbox">
           
           </div>
           <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
         </form>
       </div>
       <p class="text-center mt-5"> Não tem conta ainda? <a href="<?= base_url('index.php/page/cadastrar_me') ?>" title="Cadastro JR">Cadastre-se</a>
       </div><br><br>

    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>