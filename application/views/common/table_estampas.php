<div class="table-responsive container mt-5 pt-5">
<h1 class="text-center mx-auto">Tabela de estampas</h1>
<a href="<?=base_url('index.php/page/cadastrar_estampa')?>"><h3 class="text-center mx-auto">Criar nova Estampa</h3></a>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">N#</th>
      <th scope="col">Nome</th>
      <th scope="col">Foto</th>
      <th scope="col">Categoria</th>
      <th scope="col">Gerenciar</th>
    </tr>
  </thead>
    <tbody>
        <?= $tabela ?>
  </tbody>
</table>
</div>


