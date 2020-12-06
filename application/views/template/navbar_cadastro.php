<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url(''); ?>">Administração / <i class="fas fa-home"></i></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>
    <div class="container mx-auto">
    <div class="collapse navbar-collapse" id="ftco-nav">

      <ul class="navbar-nav ml-auto"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-friends text-warning fa-2x"></i> Clientes/Usuários
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="<?= base_url('index.php/page/admin'); ?>">Cadastrar clientes</a>
          <a class="dropdown-item" href="<?= base_url('index.php/page/lista'); ?>">Meus clientes</a>
        </div>
      </li>
      <ul class="navbar-nav"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-tshirt text-warning fa-2x"></i> Produtos
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="<?= base_url('index.php/page/lista_produtos'); ?>">Produtos</a>
          <a class="dropdown-item" href="<?= base_url('index.php/page/lista_estampas'); ?>">Estampas</a>
        </div>
      </li>
      <ul class="navbar-nav"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="fas fa-dollar-sign text-warning fa-2x"></i> Pedidos
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="<?= base_url('index.php/page/mensagens'); ?>">Pedidos estilista</a>
          <a class="dropdown-item" href="<?= base_url('index.php/page/lista_pedidos'); ?>">Pedidos pagos</a>
          <a class="dropdown-item" href="<?= base_url('index.php/page/lista_queridinhos'); ?>">Queridinhos dos Clientes</a>
        </div>
      </li>
      <ul class="navbar-nav"><li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false"><i class="far fa-image text-warning fa-2x"></i> Exibição
        <div class="dropdown-menu dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
          <a class="dropdown-item" href="<?= base_url('index.php/page/lista_carrousel'); ?>">Carrousel da Entrada</a>
        </div>
      </li>
     
        <li class="nav-item btn-danger text-center"><a href="<?php echo site_url('login/logout');?>" class="nav-link"><i class="fas fa-sign-out-alt"></i> Sair</a></li>
      </ul>
      </div>
    </div>
  </div>
</nav>