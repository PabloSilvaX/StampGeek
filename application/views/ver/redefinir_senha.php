<div class="container mt-2">
    <div class="row pt-1 mt-5 pt-5">
        <div class="col-lg-6 mx-auto border border-warning mt-5">
        <h1 class="mr-2 text-center mt-5 pt-5"> <a href="#">Redefinir minha senha</a></h1>
            <form  method="POST" class="w-100" action="<?= base_url() ?>index.php/logar/redefinir_senha">
                <label>Nova senha: </label><br>
                <input value="<?= isset($user) ? $user['senha'] : '' ?>" type="password" class="w-100" id="senha" name="senha" size="35" maxlength="60" placeholder="Digite uma nova senha" required><br><br> 
                 <label>Confirme sua nova senha: </label><br>
                <input value="<?= isset($user) ? $user['senha'] : '' ?>" type="password" class="w-100" id="senha" name="senha" size="35" maxlength="60" placeholder="confirme sua nova senha" required><br><br> 
                <div class="mx-auto text-center">
                    <input type="submit" class="btn btn-blue px-4 py-3 text-center" value="Definir" ><br><br> 
                </div>
            </form>
        </div>    
    </div>
</div>