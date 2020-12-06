

<div class="container text-center mt-3">
<?php
if($this->session->userdata('level')==='1'){
                
       echo  '<h3><a href="';
      echo base_url('index.php/loja/cadastrar_produto/');
      echo '"><i class="far fa-plus-square text"></i><p class="text"> Adicionar Produto</p></a></h3>';
                };?>
</div>
    <div class="container">
        
             <?= $ver_produtos ?>
</div>


  <thead>
  </thead>
    <tbody>
       
  </tbody>
</table>