<div class="hero-wrap" style="background-image: url('assets/img/.jpg');" data-stellar-background-ratio="0.5">
	   <div class="overlay"></div>
	      <div class="container">
	        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-6 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	          	<h1 class="mb-3 mt-5 bread" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Área do Administrador</h1>
	            <p class="breadcrumbs" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }"><span class="mr-2"><a href="<?= base_url(); ?>">Home</a></span> <span>Área do Adm</span></p>
	          </div>
	        </div>
	      </div>
	    </div>
	    <section class="ftco-section">
	    	<div class="container">
	    		<div class="row d-flex">
	    			<div class="col-md-6 d-flex ftco-animate">

					<img src="<?= base_url('assets/images/Administração.png');?>" alt="thumbnail" class="img-thumbnail"
  ></div>

	    			<div class="col-md-6 pl-md-5 ftco-animate">
	    				<h2 class="mb-4">Bem Vindo a Área de Administrador do Website.</h2>
	    				
                        <h5 class="text-warning">E ai 
                        <?php echo $this->session->userdata('username'); ?> 
                        
                        , quer saber pra que serve essa área?
						</h5>
              <p>Essa área foi desenvolvida para que você <span>Administrador</span> possa gerenciar a página a sua maneira,
               alterar preços, adicionar novos produtos esses são alguns de seus poderes como <span>Administrador
                        </span>. No menu no canto superior você tem acesso a gerenciamento do website.</p>

						<table class="table text-center mt-2">
						<h5 class="text-center mt-5">Icones para Administrar:</h5>
  <thead>
    <tr>
      <th scope="col">Exibir/Ocultar</th>
      <th scope="col">Criar</th>
      <th scope="col">Ver</th>
      <th scope="col">Editar</th>
      <th scope="col">Excluir</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row"><i class="far fa-eye text-success"></i></th>
      <td><i class="far fa-plus-square text-info"></i></td>
      <td><i class="far fa-eye text-success"></i></td>
      <td><i class="far fa-edit text-info"></i></td>
      <td><i class="fas fa-trash text-danger"></i></td>
    </tr>
    <tr>
      <th scope="row"><i class="far fa-eye-slash text-danger"></i></th>
      <td></td>
      <td></td>
      <td></td>
      <td><i class="fas fa-times-circle text-danger"></i></td>
    </tr>
    <tr>
      <th scope="row"><i class="fas fa-ban text-danger"></i></th>
      <td></td>
      <td></td>
      <td></td>
      <td><i class="fas fa-trash-alt text-danger"></i></td>
    </tr>
    <tr>
      <th scope="row"></th>
      <td></td>
      <td></td>
      <td></td>
      <td></td>
    </tr>
  </tbody>
</table>


	    			</div>
	    		</div>
	    	</div>
        </section>