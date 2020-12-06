<div class="table-responsive container mt-5">
<h5 class="text-center">
<span class="h1">Tabela de Produtos</span><br>
<a href="<?= base_url('index.php/loja/cadastrar_produto/'); ?>">
<i class="far fa-plus-square text-info" title="Adicionar Serviço"></i> Novo Produto</a>
</h5>
<table class="table mt-5">
  <thead>
    <tr>
      <th scope="col">N#</th>
      <th scope="col">Imagem</th>
      <th scope="col">Nome</th>
      <th scope="col">Descrição</th>
      <th scope="col">Preço</th>
      <th scope="col">Categoria</th>
      <th scope="col">Gerenciar</th>
    </tr>
  </thead>
    <tbody>
        <?= $tabela_produtos ?>
  </tbody>
</table>
</div>


