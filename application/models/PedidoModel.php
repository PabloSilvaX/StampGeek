<?php
include_once APPPATH.'libraries/CarrinhoLib.php';
include_once APPPATH.'libraries/PedidoLib.php';


class PedidoModel extends CI_Model{

    public function insere_car($data){
        
    if($this->session->userdata('id')<'0'){
        redirect('/login');
    }	
        if(sizeof($_POST) == 0) return;
        $this->db->insert('carrin', $data);
       
            $anterior = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : $fallback;
            header("location: {$anterior}");

    }

    public function insere_produ($produ){
        if(sizeof($_POST) == 0) return;
        
        $data['imagens'] = $this->paisagem->salva();
        $this->db->insert('produtos', $produ);
        redirect('/page/lista_produtos');
    }

    public function edita_produto_car($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new CarrinhoLib();
        $produto->edita_produto_car($data, $id);
        redirect('loja');
    }

     
   
    public function gera_tabela_pedidos(){
        $html ='';

        $pedidos = new PedidoLib();
        $data = $pedidos->listaped();
        
        foreach ($data as $ped) {
            if($this->session->userdata('id')===$ped['idcliente']||$this->session->userdata('level')==='1'){
            $html .= '<tr>';
            $html .= '<td>'.$ped['id'].'</td>';
            $html .= '<td>'.$ped['nomecliente'].'</td>';
            $html .= '<td>'.$ped['email'].'</td>';
            $html .= '<td>'.$ped['datapago'].'</td>';
            $html .= '<td>R$: '.$ped['valortotal'].'</td>';
            $html .= '<td>'.$ped['etapa'].'</td>';
            $html .= '<td>'.$ped['etapaloja'].'</td>';
            
           
            $html .= '<td>';

            $html .= '<a href="'.base_url('index.php/page/ver_pedido/'.$ped['id']).'">';
            $html .= '<i title="Ver mais" class="far fa-eye text-success"></i></a>';
            $html .= '<a href="'.base_url('index.php/page/editar_pedido/'.$ped['id']).'">';
            $html .= '<i title="Gerenciar" class="fas fa-cogs text-info ml-2"></i></a>';

            if($ped['etapa']==='<i class="fas fa-user-check text-success"> Produto recebido</i>'||$this->session->userdata('level')==='1'){
               
            $html .= '<a href="'.base_url('index.php/page/deletando_pedido/'.$ped['id']).'">';
            $html .= '<i title="Deletando" class="fas fa-trash text-danger ml-2"></i></a>';

            }

            $html .= '</td>';
            
            $html .= '</tr>';




            }
        }

        return $html;
  
}
   
   
    public function gera_tabela_car(){
        $html ='';

        $produtos = new CarrinhoLib();
        $data = $produtos->listacar();
        $precototal = 0;
        $precocalc = 0;
        $desconto = 0;
        $subtotal = 0;
        foreach ($data as $prod) {

            if($this->session->userdata('id')===$prod['idcara']){
           $precocalc = $prod['preco'] * $prod['Qtd'];
            $precototal = $precocalc + $precototal;


            
               

            $html .= '<div class ="imgCompra" style="display: inline-block; border: 1px solid; height: 150px; position: absolute;">               
            <div style="height: 125px; width: 90px; border: 1px solid; margin-right: 15px; display: inline-block; position: absolute;">     
            <img class="img-thumbnail mt-2"
            style="height: 95px;" src="';
            $html .= base_url('uploads/');
           $html .= $prod['image'];
           $html .= '.jpg"
           alt="Imagem User">
                </div>
            </div>
            <h4 style="display: inline-block; margin-left: 175px; margin-top: 30px; font-size: 18px; margin-bottom: 5px;">'.$prod['nome'].'</h4>
            <a href="'.base_url('index.php/loja/deleta_car/'.$prod['id']).'" style="margin-left: 75px; font-size: 20px; color: red;"><i class="fas fa-trash"></i></a>
            <p style="display: inline-block; margin-left: 175px; margin-bottom: 0; font-size: 14px;">TAMANHO: '.$prod['tamanho'].'</p>
            <p style="margin-left: 175px; font-size: 14px;">Estampa: '.$prod['estampa'].'</p>
 
            <hr style="border: 1px solid black; outline: none; width: 300px; margin-left: 190px;">
            <ul class="infs" style="margin-left: 180px;">
                <li class="fPrec">Qtd</li>
                <li class="prec">Valor Un.</li>
                <li class="prec">Valor Total</li>
            </ul>
           
            <ul class="infs" style="margin-left: 180px;">
               
            <button onclick="diminuir()" style="margin-left: -15px; border-style: none; background-color: rgb(94, 89, 89); padding: 2px 5px 1px 7px; margin-right: -4px; font-size: 13px; line-height: normal; color: white;">-</button>
                <input type="number" min="0" value="'.$prod['Qtd'].'" name="" id="qtd" style="width: 35px; height: 20px; border: 1px solid; outline: none; text-align: center;">
                <button onclick="aumentar()" style="border-style: none; background-color: rgb(94, 89, 89); padding: 2px 5px 1px; margin-left: -5px; font-size: 13px; line-height: normal; color: white;">+</button>
               
               
               
                <li id="prec" class="prec1">R$: '.$prod['preco'].'</li>
                <li id="precoTotal" class="prec2">R$: '.number_format($precocalc, 2, '.','').'</li>
            </ul>
            <hr style="border: 1px solid black; outline: none; width: 490px;">
           ';








        }


            

          
        }
        if($this->session->userdata('id')>'0'){
        if($precototal > '200'){ //10% de desconto acima de 200 reais
            $desconto = ($precototal / 100 * 10); 
            $subtotal = $precototal;
            $precototal = $precototal - $desconto;
        }

        $html .= '<div style="margin-top: 250px">
        <div>
            <hr style="border: 1px solid rgb(129, 127, 127); width: 95%; margin-left: 13px; margin-top: 35px; margin-bottom: 5px;"> 
            <p style="display: inline-block; margin-left: 300px; font-weight: 500;">Desconto: R$ </p>
            <p style="display: inline-block; font-weight: 500;">'.number_format($desconto, 2, '.','').'</p>
            <p style="display: inline-block; margin-left: -4px; font-weight: 500;"></p>
        </div>
        <div>
            <hr style="border: 1px solid rgb(129, 127, 127); width: 95%; margin-left: 13px; margin-top: 5px; margin-bottom: 5px;"> 
            <p style="display: inline-block; margin-left: 300px; font-weight: 500;">Subtotal: R$ </p>
            <p style="display: inline-block; font-weight: 500;">'.number_format($subtotal, 2, '.','').'</p>
            <p style="display: inline-block; margin-left: -4px; font-weight: 500;"></p>
        </div>
        <div>
        
        
        

        </div>
        <div>
            <hr style="border: 1px solid rgb(129, 127, 127); width: 95%; margin-left: 13px; margin-top: 5px; margin-bottom: 5px;"> 
            <p style="display: inline-block; margin-left: 290px; font-weight: 500;">Total a pagar: R$ </p>
            <p style="display: inline-block; font-weight: 500;">'.number_format($precototal, 2, '.','').'</p>
            <p style="display: inline-block; margin-left: -4px; font-weight: 500;"></p>      
        </div>
        <div>
            <a href="';

            $html .= base_url('index.php/page/etapa1/');
            $html .= $this->session->userdata('id');
            
            if($precototal > '0'){
            $html .= '"><button class="btn btn-warning btn-lg botao" style="margin-left: 50%; transform: translateX(-50%); width: 80%; margin-top: 15px; font-weight: 600; color: white; background-color: #F66509;">Finalizar Compra</button></a>';
            }else{
                $html .= '"><button class="btn btn-warning btn-lg botao" disabled style="margin-left: 50%; transform: translateX(-50%); width: 80%; margin-top: 15px; font-weight: 600; color: white; background-color: #F66509;">Sem produtos no Carrinho</button></a>';
            }
            $html .= '</div>

    </div>
';
    }else{
    $html .= '<div class="container mx-auto text-center mb-5 mt-5 md-5">
    <h1><a class="text-warning" href="'.base_url('index.php/page/cadastrar_me').'">Crie uma conta</a> ou Fa??a<a class="text-warning" href="'.base_url('index.php/login').'">  Login </a>
    para come??ar as compras <i class="far fa-address-card"></i></a></h1>
    </div>
    ';
    }

        return $html;
  
  

  
}
   
    public function gera_tabela_caretapa(){
        $html = '';
        $produtos = new CarrinhoLib();
        $data = $produtos->listacar();
        $precototal = 0;
        $precocalc = 0;
        $desconto = 0;


        
        foreach ($data as $prod) {
            
            if($this->session->userdata('id')===$prod['idcara']){
            $precocalc = $prod['preco'] * $prod['Qtd'];
            $precototal = $precocalc + $precototal;

            }

        }
        
        if($this->session->userdata('id')===$prod['idcara']){
            $subtotal = $precototal;
                 if($precototal > '200'){
                $desconto = ($precototal / 100 * 10);
                $precototal = $precototal - $desconto;
            } 

        $html .= '
        <div class="row" >
            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px;">Subtotal: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px;">R$: '.number_format($subtotal, 2, '.','').'</p>
            </div>

            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px;">Frete: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px;">R$: 0,00</p>
            </div>

            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px;">Desconto: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px;">R$: '.number_format($desconto, 2, '.','').'</p>
            </div>
            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px; font-weight: 500;">Total a pagar: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px; font-weight: 500;">R$: '.number_format($precototal, 2, '.','').'</p>
            </div>
        </div> <h4 style="display: inline-block; font-weight: 700; margin-bottom: 15px; margin-top: 25px">Visualizar os Produtos</h4>';

        }

        foreach ($data as $prod) {

            
            if($this->session->userdata('id')===$prod['idcara']){

            $precocalc = $prod['preco'] * $prod['Qtd'];
            $precototal = $precocalc + $precototal;


            $html .= '
            <div style="height: 175px; border: 1px solid; border-radius: 10px; padding: 15px;" class="mt-2">
            <div style="height: 125px; width: 90px; border: 1px solid; margin-right: 15px; display: inline-block; position: absolute;">
            
            <img class="img-thumbnail"
            src="'.base_url('uploads/').''.$prod['image'].'.jpg"
          
           
           alt="Imagem User">
            
            </div>
            <h4 style="display: inline-block; font-size: 16px; margin-left: 105px">Camiseta manga longa</h4>

            <p style="display: inline-block; font-size: 16px; margin-left: 105px; margin-bottom: -5px;">Tamanho: XG</p>
            <p style="display: inline-block; font-size: 16px; margin-left: 105px;">Estampa: '.$prod['estampa'].'</p>
            <p style="display: inline-block; font-size: 16px; margin-left: 105px; margin-bottom: -5px;">Quantidade: '.$prod['Qtd'].'</p>
            <p style="display: inline-block; font-size: 16px; margin-left: 105px; margin-bottom: -5px;">R$: '.number_format($precocalc, 2, '.','').'</p>
        </div>';

            

          
        }
    }
        return $html;
    
}
   
   
    public function gera_tabela_caretapa3(){
        $html = '';
        $produtos = new CarrinhoLib();
        $data = $produtos->listacar();
        $precototal = 0;
        $precocalc = 0;
        $desconto = 0;
        $contador = 0;
        $nomes = '';
        $qtds = '';
        $valores = '';
        $tamanhos = '';
        $estampas = '';
        $links = '';
        $cores = '';
        $images = '';
        

        $iconaguarde = "<i class='fas fa-clock text-warning'></i>";
        $iconpago = "<i class='far fa-credit-card text-success'></i>";
        $horario = date('d-m-Y H:i:s');

        foreach ($data as $prod) {
            
            if($this->session->userdata('id')===$prod['idcara']){
            $precocalc = $prod['preco'] * $prod['Qtd'];
            $precototal = $precocalc + $precototal;
         
 
            }

        }
        
        
            $subtotal = $precototal;
                 if($precototal > '200'){
                     
                $desconto = ($precototal / 100 * 10);
                $precototal = $precototal - $desconto;
            } 

        $html .= '
        <div class="row" >
            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px;">Subtotal: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px;">R$: '.number_format($subtotal, 2, '.','').'</p>
            </div>

            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px;">Frete: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px;">R$: 0,00</p>
            </div>

            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px;">Desconto: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px;">R$: '.number_format($desconto, 2, '.','').'</p>
            </div>
            <div class="col-md-6">
                <p style="text-align: left; margin-bottom: 5px; font-weight: 500;">Total a pagar: </p>
            </div>
            <div class="col-md-6">
                <p style="text-align: right; margin-bottom: 5px; font-weight: 500;">R$: '.number_format($precototal, 2, '.','').'</p>
            </div>
        </div> <h4 style="display: inline-block; font-weight: 700; margin-bottom: 15px; margin-top: 25px">Visualizar os Produtos</h4>';

        

        foreach ($data as $prod) {

            
            if($this->session->userdata('id')===$prod['idcara']){

                $precocalc = $prod['preco'] * $prod['Qtd'];

            $html .= '
            <div style="height: 175px; border: 1px solid; border-radius: 10px; padding: 15px;" class="mt-2">
            <div style="height: 125px; width: 90px; border: 1px solid; margin-right: 15px; display: inline-block; position: absolute;">
            <img class="img-thumbnail mt-2"
            style="height: 95px;" src="';
            $html .= base_url('uploads/');
           $html .= $prod['image'];
           $html .= '.jpg"
           alt="Imagem User">
            </div>
            <h4 style="display: inline-block; font-size: 16px; margin-left: 105px">'.$prod['nome'].'</h4>

            <p style="display: inline-block; font-size: 16px; margin-left: 105px; margin-bottom: -5px;">Tamanho: '.$prod['tamanho'].'</p>
            <p style="display: inline-block; font-size: 16px; margin-left: 105px;">Estampa: '.$prod['estampa'].'</p>
            <p style="display: inline-block; font-size: 16px; margin-left: 105px; margin-bottom: -5px;">Quantidade: '.$prod['Qtd'].'</p>
            <p style="display: inline-block; font-size: 16px; margin-left: 105px; margin-bottom: -5px;">R$ '.number_format($precocalc, 2, '.', '').'</p>
        </div>';

            

          
        }
    }

        $html .= '<br><a style="margin-left: 133px;" href="'.base_url('index.php/page/lista_car').'"><i class="fas fa-cart-arrow-down"></i> Voltar para o Carrinho</a> </div>

        <input value="Estampa padr??o" type="hidden" class="form-control" name="estampa" placeholder="">
        
        <div class="container">
            <div class="row">


            
        
                            


                <div class="col-lg-12" style="border: 1px solid; margin-top: 35px; padding: 15px; border-radius: 10px;">
                    <i class="fas fa-truck" style="font-size: 32px"></i>
                    <h4 style="display: inline-block; margin-left: 15px; font-weight: 700; margin-bottom: 45px;">
                        Identifica????o do cliente</h4>

                    <div style="justify-content: space-around;" class="row">

                        <div class="col-lg-5" style="border: 1px solid; padding: 15px; margin: 15px 15px 0">


                        <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" value="DLOG" id="customControlValidation2" name="veiculoentrega"  checked>
            <label class="custom-control-label" for="customControlValidation2">DLOG</label>
                            <p style="margin-top: 15px">3 Dia(s) ??teis</p>
                            <p style="margin-top: 15px">R$ 5,00</p>
                        </div></div>


                        <div class="col-lg-5" style="border: 1px solid; padding: 15px; margin: 15px 15px 0">
                        
				
            <div class="custom-control custom-radio">
            <input type="radio" class="custom-control-input" value="SEDEX" id="customControlValidation3" name="veiculoentrega">
            <label class="custom-control-label" for="customControlValidation3">SEDEX</label>
                            <p style="margin-top: 15px">3 Dia(s) ??teis</p>
                            <p style="margin-top: 15px">R$ 15,00</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        

 
        
        
        ';

        
        //<button class="btn btn-primary  ftco-animate  btn-md" type="submit">Enviar</button>
        //</form>


        foreach ($data as $prod) {
        $contador++;
        $nomes .= '<td>'.$contador.''.$prod['nome'].'</td>';
         $images .= '<td>'.$prod['image'].'</td>';
        $qtds .= '<td>'.$prod['Qtd'].'</td>';
        $valores .= '<td>'.$prod['preco'].'</td>';
        $tamanhos .= '<td>'.$prod['tamanho'].'</td>';
        $estampas .= '<td>'.$prod['estampa'].'</td>';
        $links .= '<td>'.$prod['linkprod'].'</td>';
        $cores .= '<td>'.$prod['estampa'].'</td>';
       
        
        }




        $html .= '   
            
       
          <input type="hidden" value="'.$nomes.'" id="form1" name="produtos" class="form-control">
          <input type="hidden" value="'.$qtds.'" id="form1" name="quantidades" class="form-control">
          <input type="hidden" value="'.$valores.'" id="form1" name="valores" class="form-control">
          <input type="hidden" value="'.$tamanhos.'" id="form1" name="tamanhos" class="form-control">
          <input type="hidden" value="'.$estampas.'" id="form1" name="estampas" class="form-control">
          <input type="hidden" value="'.$links.'" id="form1" name="links" class="form-control">
          <input type="hidden" value="'.$cores.'" id="form1" name="cores" class="form-control">
          <input type="hidden" value="'.$images.'" id="form1" name="images" class="form-control">
         
          

          <input type="hidden" value="'.number_format($desconto, 2, '.', '').'" id="form1" name="desconto" class="form-control">
          <input type="hidden" value="Gr??tis" id="form1" name="frete" class="form-control">
          <input type="hidden" value="'.number_format($precototal, 2, '.', '').'" id="form1" name="valortotal" class="form-control">
          <input type="hidden" value="Pedidos pagos '.$iconpago.'" id="form1" name="etapa" class="form-control">
          <input type="hidden" value="Aguarde '.$iconaguarde.'" id="form1" name="etapa" class="form-control">

          <input type="hidden" value="'.$horario.'" id="form1" name="datapago" class="form-control">
            


        <div class="container">
            <div class="row">
                <div class="col-lg-12"
                    style="border: 1px solid; margin-top: 35px; padding: 15px; border-radius: 10px; ">
                    <div class="col-sm-6 cartao">
                    <div class="container col-sm-12">
                    <img class="mx-auto d-block"
            style="height: 220px;" src="';
            $html .= base_url('assets/images/IMG5.png');
          
           $html .= '"
           alt="Imagem User">
                    
                    </div>
                    
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <label for="numeroCartao" class="nInput">N??mero</label>
                            <input id="numeroCartao" type="tel" class="stInput" inputmode="numeric"
                                pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19"
                                placeholder="xxxx xxxx xxxx xxxx" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="nome" class="nInput">Nome</label>
                            <input name="nome" class="stInput" type="text" required>
                        </div>
                        <div class="col-sm-6" style="display: inline-block;">
                            <label for="validade" class="nInput">Data</label>
                            <input name="validade" class="stInput" maxlength="7" placeholder="MM / YY" type="number" required>
                        </div>
                        <div class="col-sm-6" style="display: inline-block;">
                            <label for="CVV" class="nInput">CVV</label>
                            <input name="CVV" class="stInput" maxlength="4" type="number" required>
                        </div>
                        <div class="col-lg-12">
                            <label for="parcelas" class="nInput">Parcelar em</label>
                            <input class="stInput" list="parcelas" name="parcelas" required>
                            <datalist id="parcelas">
                                    <option value="Parcelar em 1x">
                                    <option value="Parcelar em 2x">
                                    <option value="Parcelar em 3x">
                                    <option value="Parcelar em 4x">
                                    <option value="Parcelar em 5x">
                                    <option value="Parcelar em 6x">
                                    <option value="Parcelar em 7x">
                                    <option value="Parcelar em 8x">
                                    <option value="Parcelar em 9x">
                                    <option value="Parcelar em 10x">
                                    <option value="Parcelar em 11x">
                                    <option value="Parcelar em 12x">
                            </datalist>
                        </div>

                        <div class="col-lg-12">
                            <button class="btn btn-secondary btn-lg" style="width: 100%; margin-top: 25px;"><i class="fas fa-credit-card"></i> Pagar com cart??o</button>
                        </div>
                    </div>';

        return $html;
    
}
   

    public function gera_tabela_produtos_v(){
        $html ='';

        $produtos = new CarrinhoLib();
        $data = $produtos->lista();

        foreach ($data as $prod) {

           
            $html .= '<div class="col-md-4 mt-3">
            <div class=" text-center"><a href="';
            $html .= base_url('index.php/barbearia/#produtos');
            $html .= '"><img src="';
            $html .= base_url('uploads/');
            $html .= $prod['titulo_img'];
            $html .= '.jpg" class="img-fluid" alt="Produto 1"></a>';
            $html .= '
            <div class="text"><a href="';
            $html .= base_url('index.php/loja/ver_produto/');
            $html .= $prod['id'];
            $html .= '"><p>Veja Mais</p></a>
            <h3>';
            $html .= '<strong class="text-warning">'.$prod['nome'].'</strong></h3>';
            
            $html .= '<span class="price mb-4">R$'.$prod['preco'].'</span>';
            $html .= '<td>'.$this->action_buttons($prod['id']).'</td>';
            $html .= '    
                </div>
            </div>
        </div>';   
        }
        return $html;
    }

    
    private function action_buttons($id){
        if($this->session->userdata('level')==='1'){
        $html = '<a href="'.base_url('index.php/loja/editar_produto/'.$id).'">';
        $html .= '<i title="Editar" class="far fa-edit amber-text mt-1 ml-2"></i></a>';
        $html .= '<a href="'.base_url('index.php/loja/deleta_produto/'.$id).'">';
        $html .= '<i title="Deletando" class="fas fa-times-circle text-danger mt-1 ml-2"></i></a>';
        return $html;}
    }


  

    public function edita_produto($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new CarrinhoLib();
        $produto->edita_produto($data, $id);
        redirect('loja');
    }
    
    public function edita_pedido($id){
        if(sizeof($_POST) == 0) return;
        $data = $this->input->post();
        $produto = new PedidoLib();
        $produto->edita_pedido($data, $id);
       redirect('page/lista_pedidos/'.$id.'');
    }


    public function deleta_car($id){
        $produto= new CarrinhoLib();
        $produto->deleta($id);
    }

    public function deleta_geral($id){
        $produto= new CarrinhoLib();
        $produto->deletatudo($id);
    }
    
    public function deleta_ped($id){
        $mensagens= new PedidoLib();
        $mensagens->deleta($id);
    }

    public function read($id){
        $servicos = new PedidoLib();
        return $servicos->pedidos_data($id);
    }
    
}
