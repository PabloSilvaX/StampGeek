<div class="table-responsive container mt-5 border">
<h3 class="text-center mt-3">Tabela do Carrousel:</h3>
<p class="text-center">O carrousel é o conjunto de imagens exibidas na <a href="<?= base_url('')?>">Pagina de entrada</a> do site.</p>
<h5 class="text-center"><a class="text-info" href="<?=base_url('index.php/page/cadastrar_banner')?>"><i class="fas fa-plus-circle"></i> Adicionar Carrousel</a></h5>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">N#</th>
      <th scope="col">Imagem</th>
      <th scope="col">Link Para</th>
      <th scope="col">Deletar</th>
    </tr>
  </thead>
    <tbody>
         <?= $tabela_carrousel ?>
  </tbody>
</table>
</div>

