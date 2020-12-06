
<div class="container mt-5 mx-auto"><br/><br/>
            <form method="post" action="<?= base_url('index.php/page/cadastrar_estampa') ?>" enctype="multipart/form-data" class="text-center border border-light p-5">
            
 



                <p class="h4">Adicionar nova Estampa</p>
               Adicione uma nova estampa preenchendo suas informações nos campos abaixo e enviando.
                <div class="text-center mt-5">
           
</div>


<input type="" value="" type="text" class="form-control" name="nome" placeholder="Nome da estampa" required>

<label class="mt-3">Categoria: </label><br>
                <select type="text" class="form-select" id="categoria" name="categoria"  required>
                <option> Escolha um icone </option>
                <option value='Animes/HQs'> Animes/HQs </option>
                <option value='Filmes'> Filmes </option>
                <option value='Séries'> Séries </option>
                </select>


                <input type="hidden" value="<?php echo date('dmY_His');?>" name="titulo_img" id="titulo_img" placeholder="Titulo da imagem" class="form-control mb-4" />
                <input type="hidden" value="1" name="estado" id="estado" placeholder="Titulo da imagem" class="form-control mb-4" />

                <p class="text-warning mt-3">Selecione uma imagem para o Produto.</p>
                <input type="file" name="userfile" id="userfile" class="form-control mb-4" placeholder="Selecione uma imagem" required/>
                <p> Somente imagens (de extensão .jpg/.png) são aceitas, caso a imagem demore a carregar continue aguardando, seu navegador pode demorar algum tempo para atualizar coockies.</p>
                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>
        </div>
       
    </div>
</div>

<script>
//proibindo caracteres no campo de preço, para evitar problemas nos calculos de valores
  document.getElementById("teste").onkeypress = function(e) {
         var chr = String.fromCharCode(e.which);
         if ("1234567890.".indexOf(chr) < 0)
           return false;
       };
       </script>