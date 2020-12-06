<div class="container col-5 mt-5 pt-5 xl-auto">

    <form method="POST" class="w-100">
      <p class="h4 text-center py-4 pt-5 mt-5">Editar Serviço</p>
      <div class="md-form">
        <i class="fas fa-marker prefix grey-text"></i>
        <div class="icon"><span class="ion-md-calendar"></span></div>
		    <input value="<?= isset($user) ? $user['nome'] : '' ?>" class="w-100 text-white" type="text" name="nome" placeholder="Nome do Serviço" required>
      </div>
      <div class="md-form">
        <i class="fas fa-clipboard-list prefix grey-text"></i><div class="icon"><span class="ion-md-calendar"></span></div>
		    <input value="<?= isset($user) ? $user['detalhe'] : '' ?>" class="w-100 text-white" type="text" name="detalhe" placeholder="Descrição do Serviço" required>
      </div>
      <div class="md-form">
        <i class="fas fa-dollar-sign prefix grey-text"></i><div class="icon"><span class="ion-md-calendar"></span></div>
		    <input value="<?= isset($user) ? $user['preco'] : '' ?>" class="w-100 text-white" type="text" name="preco" placeholder="Preço, exemplo '20,99'" required>
      </div>
      <div class="text-center py-4 mt-3">
        <button class="btn btn-amber" type="submit">Editar</button>
      </div>
    </form>

</div>
