
    <div class="container" style="margin-top: 35px">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
              <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
            <?php if($this->session->userdata('level')==='1'){ ?>
<h5 class="text-center"><a href="<?=base_url('index.php/page/cadastrar_banner')?>"><i class="fas fa-plus-circle"></i> Adicionar Carrousel</a>
<a class="text-danger ml-5" href="<?=base_url('index.php/page/lista_carrousel')?>"><i class="far fa-trash-alt"></i> Excluir um Carrousel</a></h5>
            <?php } ?>


<?= $tabela_carrousel ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" style="color: black" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a  class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" style="color: black" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
    </div>
