
<section class="ftco-section" id="produtos" >


<div class="container mt-5 pt-5">
    <div class="row justify-content-center mb-0 pb-0">
  <div class="col-md-7 heading-section ftco-animate text-center">
   <?php if($this->session->userdata('level')==='1'){
echo ' <a href="';
echo base_url('index.php/barbearia/cadastrar_produto');
echo '">    <h2 class="text-info"> Adicionar produto <i class="far fa-plus-square"></i></h2>
    </a>';
}else{
echo '<h1 class="text-warning"> Mais produtos: </h1>';
}?>
   
    
  </div>
</div>
    <div class="row ftco-animate mt-5">
<thead>
</thead>
<tbody>
<?= $ver_produtos ?>

</tbody>
</table>
</div>
</div>
</section>
