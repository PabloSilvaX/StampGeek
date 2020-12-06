<div class="container col-xs-12 mx-auto mt-5 pt-5">
        <div class="col-12 mt-5 pt-2 mx-auto border border-warning">
        <h1 class="text-center text-warning mt-5"> Cadastrar Usuário </h1>
        <p class="text-center">O Usuário Cadastrado como cliente ganha uma foto, uma pagina de perfil e pode deixar sua Avaliação no Site. 
        Obs: O uso da conta de maneira indevida pode resultar na esclusão da conta.
        </p>
        
        <script>

function Onlynumbers(e)
{
	var tecla=new Number();
	if(window.event) {
		tecla = e.keyCode;
	}
	else if(e.which) {
		tecla = e.which;
	}
	else {
		return true;
	}
	if((tecla >= "97") && (tecla <= "122")){
		return false;
	}
}

function Onlychars(e)
{
	var tecla=new Number();
	if(window.event) {
		tecla = e.keyCode;
	}
	else if(e.which) {
		tecla = e.which;
	}
	else {
		return true;
	}
	if((tecla >= "48") && (tecla <= "57")){
		return false;
	}
}

if (preg_match("/([a-zA-Z0-9-é])/", $email)){return true;}
</script>

            <form  method="POST" class="w-100" action="<?= base_url() ?>index.php/page/cadastrar">

                <input type="hidden" value="<?= isset($user) ? $user['titulo_img'] : '' ?>primeira_img" name="titulo_img" id="titulo_img" class="form-control mb-4" />

                <label class="text-warning"> Nome: </label><br>
                <input value="<?= isset($user) ? $user['nome'] : '' ?>" type="text" maxlength="128" class="w-100" id="nome" name="nome" size="35" maxlength="60"  placeholder="Digite seu nome completo." required> <br><br>
                <label class="text-warning">E-mail: </label><br>
                <input value="<?= isset($user) ? $user['email'] : '' ?>" type="email" maxlength="256" class="w-100" id="email" name="email" size="35" maxlength="60" placeholder="Digite um e-mail válido." required><br><br> 
                <label class="text-warning">Senha: </label><br>
                <input value="<?= isset($user) ? $user['senha'] : '' ?>" type="password" maxlength="50" class="w-100" id="senha" name="senha" size="35" maxlength="60" placeholder="Digite uma senha (maximo 50 caracteres)." required><br><br> 
                <label class="text-warning">Telefone: </label><br>
                <input value="<?= isset($user) ? $user['telefone'] : '' ?>" type="text" onkeypress="return Onlynumbers(event)" maxlength="30" class="w-100" id="telefone" name="telefone" size="35" maxlength="12" placeholder="Digite seu numero de Celular/Telefone" required><br><br>
                
                <input value="2" type="hidden" class="w-100" id="nivel" name="nivel" placeholder="Nivel" required>
                <br><br> 
                <div class="mx-auto text-center">
                    <input type="submit" class="btn btn-blue px-4 py-3 text-center" value="Salvar">
                </div>
            </form>
        </div>    
    </div>
</div>
<br>