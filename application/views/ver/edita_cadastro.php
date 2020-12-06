<div class="container mt-5 pt-5">
    <div class="row pt-4 mt-4">
        <div class="col-lg-6 mx-auto border border-warning">
        <h1 class="mr-2 text-center mt-5"> <a href="#"> Editar Usuário </a></h1>
        <?php if($this->session->userdata('id')===$user['id']){
           
           echo '<div class="container text-center">';
            echo '<p>Atualize as informações sobre você nos campos abaixo</p>';
            echo '</div>';
        }
        ?>
        <div class="container mt-5"><br/><br/>
    <div class="row text-center">
        <div class="col-md-11 mx-auto text-center">
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5"><!-- Post não precisa ser maiúsculo (pode ser post ou POST) -->
            
 



                <p class="h4 mb-4">Adicionar nova Foto de Perfil</p>
               
                <div class="text-center">
          
            <img 
             src="<?= base_url(); ?>uploads/<?= isset($user) ? $user['titulo_img'] : '' ?>.jpg" 
            class="img-fluid ">
           
</div>

                <input type="hidden" value="<?= isset($user) ? $user['id'] : '' ?>_img" name="titulo_img" id="titulo_img" class="form-control mb-4" />
                <input type="file" name="userfile" id="userfile" class="form-control mb-4" placeholder="Selecione uma imagem"/>
                <p> Somente imagens (jpg/png) são aceitas, caso a imagem demore a carregar após apertar em enviar continue aguardando, seu navegador pode demorar a atualizar coockies.</p>
                <button class="btn btn-info btn-block my-4" type="submit">Enviar</button>
           
        </div>
       
    </div>
</div>
          

                <label class="pt-2"> Nome: </label><br>
                <input value="<?= isset($user) ? $user['nome'] : '' ?>" type="text" class="w-100" id="nome" name="nome" size="35" maxlength="60"  placeholder="Digite seu nome completo" required><br><br>
                <label>E-mail: </label><br>
                <input value="<?= isset($user) ? $user['email'] : '' ?>" type="email" class="w-100" id="email" name="email" size="35" maxlength="60" placeholder="Digite um e-mail válido" required><br><br> 
                
                <?php if($this->session->userdata('id')===$user['id']){
                    echo '<label>Senha: </label><br>';
                    echo '<input value="';
                    echo '" type="password" class="w-100" id="senha" name="senha" size="35" maxlength="60" placeholder="Digite sua nova senha aqui" required><br><br>';
                }else{}?>

                <label>Telefone: </label><br>
                <input value="<?= isset($user) ? $user['telefone'] : '' ?>" type="text" class="w-100" id="telefone" name="telefone" size="35" maxlength="12" placeholder="Digite um numero de celular" required><br><br>
               
                <?php
                  if($this->session->userdata('level')==='1'){


                    
                   echo ' <label>Nível: </label><br>
                <select type="text" class="form-select" id="nivel" name="nivel"  required>
                <option value=""> Selecione o Nivel </option>
                <option value="1"> Administrador </option>
                <option value="2"> Cliente </option>';
                  }
                  ?>
                    
                </select>
                <div class="mx-auto text-center">
                    <input type="submit" class="btn btn-blue px-4 py-3 text-center" value="Salvar">
                </div>
            </form>
        </div>    
    </div>
</div>
<br>