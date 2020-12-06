
<div class="container mt-5 mx-auto"><br/><br/>
         
            <!-- 1 = Exibe
                 2 = Esconde  
             -->


         <?php if($user['estado']==='1'){ ?>
         
            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
            
                <p class="h4"><i class="fas fa-ban text-danger"></i> Esconder Estampa?</p>
               A estampa não será exibida na lista de estampas dos produtos.
                <div class="text-center mt-5">
           
</div>

                <input type="hidden" value="2" name="estado" id="estado" placeholder="Titulo da imagem" class="form-control mb-4" />
               
                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>

         <?php } ?>

         <?php if($user['estado']==='2'){ ?>

            <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
            
                <p class="h4"><i class="far fa-check-circle text-success"></i> Mostrar Estampa?</p>
                A estampa será exibida na lista de estampas dos produtos.
                <div class="text-center mt-5">
           
</div>

                <input type="hidden" value="1" name="estado" id="estado" placeholder="Titulo da imagem" class="form-control mb-4" />
               
                <button class="btn btn-info btn-block my-4" value="Salvar" type="submit">Enviar</button>
            </form>

         <?php } ?>






            
        </div>
       
    </div>
</div>
