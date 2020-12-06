<?php $res = '0'?>

<div class="container mt-5">

<?php foreach ($listagem as $resultado) : ?>
        <?php $res++ ?>
        <?php endforeach; ?>

<h1 class="text-center"><?=$res?> Resultado(s) Encontrado(s):</h1>

<div class="row mt-5">


        <?php foreach ($listagem as $resultado) : ?>
            
            <div class="col-md-4 mt-3">
            <div class="card">
            <div class=" text-center"><a href="<?=base_url('index.php/barbearia/#produtos')?>
            "><img src="<?=base_url('uploads/')?><?=$resultado['titulo_img']?>.jpg" class="img-fluid mt-3" alt="Produto 1"></a>
            <div class="text"><a href="
            <?=base_url('index.php/loja/ver_produto/')?><?=$resultado['id']?>"><p>Veja Mais</p></a>
            <h3>
           <strong class="text-warning"><?=$resultado['nome']?></strong></h3>
            
            <span class="price mb-4">R$<?=$resultado['preco']?></span>
               
                </div>
            </div>
        
</div>
        
</div>



        <?php endforeach; ?>
        <br>
       
<!--
    <h1>Buscar</h1>
    <form action="base_url('index.php/page/resultado/')?>" method="post">
        <label for="busca">Pesquisa</label>
        <input type="text" name="busca" id="busca" class="form-control">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
-->
</div>
</div>