<div class="table-responsive container mt-5 border">
<h3 class="text-center mt-3">Pedidos Pagos:</h3>
<table class="table mt-3">
  <thead>
    <tr>
      <th scope="col">N#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Data de Pagamento</th>
      <th scope="col">Valor das compras</th>
      <th scope="col">Status do cliente</th>
      <th scope="col">Status da loja</th>
     <?php if($this->session->userdata('level')==='1'){ 
       echo '<th scope="col">Gerenciar</th>';
     } ?>
    </tr>
  </thead>
    <tbody>
         <?= $tabela_pedidos ?>
  </tbody>
</table>
</div>

