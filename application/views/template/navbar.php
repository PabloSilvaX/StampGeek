<?php
include_once APPPATH.'controllers/Login.php';
?>

<div style="padding: 15px; background-color: #4D4D4D;" >
    <div class="container" >
        <nav class="navbar navbar-expand-lg navbar-dark " style="margin-top: -15px; background-color:  #4D4D4D;">
           
            <a href="<?=base_url('');?>">
            <img src="<?=base_url('assets/images/Stamp Geek.png')?>"  alt="thumbnail" class="img-thumbnail" style="width: 120px;" alt="...">
            
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
              <div class="navbar-nav">
                  

                 
              <form action="<?=base_url('index.php/page/resultado/')?>" method="post">
             <input type="text" name="busca" id="busca" class="pesq" placeholder="Procurar...">
        <i class="fas fa-search text-white" aria-hidden="true"></i> 
        <button style="background-color: transparent; border: none; " type="submit"></button>
    </form>
   



                  <!-- 
                    <form class="form-inline" action="<base_url('index.php/page/resultado/')?>">
                        <input class="pesq" type="text" name="palavra" placeholder="Pesquisar" aria-label="Search">
                        <button  style="background-color: transparent; border: none; margin-left: -40px; padding-top: 60px; font-size: 20px; color: black; outline: none;" type="submit"><i class="fas fa-search"></i></button>
                      </form>
 -->



                  <div class="icons row"></div>
                    <a class="nav-item  text"  href="https://www.google.com/maps/search/stamp+geek/@-23.5570546,-46.691706,12z/data=!3m1!4b1">Nossas Lojas</a>
                    <a class="nav-item  text"  href="<?=base_url('index.php/loja/quemsomos')?>">Fale Conosco</a>
                    <a class="nav-item  text"  href="<?=base_url('index.php/loja/quemsomos')?>">Quem Somos</a>
                  </div></div>

                  <div class="iconC" >
                    <a class = "icon iconP"href="<?=base_url('index.php/page/lista_favoritos')?>"><i class="fas fa-heart" style="color: #FF4500"></i></a>


                    

                    <?php if($this->session->userdata('level')>'3' || $this->session->userdata('level')==='2' ){
                      
                      echo '<li class="nav-item dropdown">';

                      echo '<i class="fas fa-user icon  dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown"
                      aria-haspopup="true" aria-expanded="true""></i>';
            
                      echo '<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
                      <a class="dropdown-item" href="'.base_url('index.php/page/cliente/').''.$this->session->userdata('id').'">Meu Perfil <i class="fas fa-user-alt"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/page/lista_pedidos').'">Meus Pedidos <i class="far fa-credit-card"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/page/mensagens').'">Pedidos estilista <i class="fas fa-palette"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/page/lista_car').'">Meu Carrinho <i class="fas fa-shopping-cart"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/login/logout').'">Sair <i class="fas fa-sign-out-alt text-danger"></i></a>
                    </div>
                  </li>';



                    }elseif($this->session->userdata('level')==='1'){

         echo '<li class="nav-item dropdown">';

          echo '<i class="fas fa-user icon  dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="true""></i>';

          echo '<div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="'.base_url('index.php/page/cliente/').''.$this->session->userdata('id').'">Meu Perfil <i class="fas fa-user-alt"></i></a>
          <a class="dropdown-item" href="'.base_url('index.php/page').'">Administrar Site <i class="fas fa-tools"></i></a>
          <a class="dropdown-item" href="'.base_url('index.php/page/lista_pedidos').'">Pedidos dos clientes <i class="far fa-credit-card"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/page/mensagens').'">Pedidos estilista dos Clientes <i class="fas fa-palette"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/page/lista_car').'">Meu Carrinho <i class="fas fa-shopping-cart"></i></a>
                      <a class="dropdown-item" href="'.base_url('index.php/login/logout').'">Sair <i class="fas fa-sign-out-alt text-danger"></i></a>
        </div>
      </li>';




                    }elseif($this->session->userdata('level')===''){
                      echo '<i class="fas fa-user"></i>';
                    }else{
                      echo '<a class = "icon" href="';
                      echo base_url('index.php/login/');
                      echo '"><i class="fas fa-user"></i></a>';
                    }
                      ?>


                   <? $tabela_qnts ?>

                    
                   
                   
                   
                    <a class = "icon" ><i class="fas fa-shopping-cart text-white" type="button" data-toggle="modal" data-target="#modalAbandonedCart"></i></a>
                  </div>

<!-- Button trigger modal-->


<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="modalAbandonedCart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading"><i class="fas fa-tshirt"></i> Produtos no carrinho:
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class = "carrCompra">
            <div style="background-color: #d3d3d3; border-bottom: 1px solid;">
                <h3 style="padding: 15px 0 10px 25px;">Meu Carrinho <i class="fas fa-shopping-cart text-info"></i></h3>
            </div>


                <?= $tabela_carrinho ?>
                
               
                </div>
      <!--Footer-->
      <div class="modal-footer justify-content-center mt-3">
      <?php if($this->session->userdata('id')>'0'){
       echo '<a type="button" href="'.base_url('index.php/page/lista_pedidos').'" class="btn btn-info">Acompanhar Pedidos</a>';
      }
       ?>
        <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Fechar</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->

                </div>
            </div>
        </nav>
    </div>
</div>

<script src="<?= base_url('assets/Scripts/Index.js');?>"></script>

