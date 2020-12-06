<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/Styles/stylesPagamento.css')?>">
    <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&family=Poppins:wght@300&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
    </script>
    <script src="https://kit.fontawesome.com/5dda139b8d.js" crossorigin="anonymous"></script>
</head>

<body>
    <div style="background-color: #4D4D4D; padding: 15px;">
        <div class="container">
            <div class="row" style="justify-content: center;">
                <div class="col-sm-3">
                               <div style="background-color: white; width: 120px; height: 10px; display: inline-block; margin: 10px;">
                <a href="<?=base_url('');?>">
            <img src="<?=base_url('assets/images/Stamp Geek.png')?>"  alt="thumbnail" class="img-thumbnail" style="width: 120px;" alt="...">
            
            </a>
                    </div>
                </div>
                <div class="p1 col-sm-2" >
                    <div class="dot">
                    <p class="dotNumber">1</p>
                </div>
                <p class="dotText">Identificação</p>
                </div>
                <div class="p2 col-md-2">
                    <div class="dot" style="background-color: orange;">
                        <p class="dotNumber">2</p>
                    </div>
                    <p class="dotText">Pagamento</p>
                </div>
                <div class="p3 col-md-2">
                    <div class="dot">
                        <p class="dotNumber">3</p>
                    </div>
                    <p class="dotText">Confirmação</p>
                </div>
            </div>
        </div>
    </div>
    <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
    <div class="container">
        <div class="row">
            <div class="col-sm-7 personalInfo " style="border: 1px solid; margin-top: 40px; padding: 15px; border-radius: 5px; height:800px;">
            
                <h4 style="font-weight: 700;">Informações pessoais</h4>
                <hr style="border: 1px solid; border-color: #adadad;">
    
                <div class="row">
                    <div class="col-sm-12">
                        <label for="email" class="nInput">E-mail: </label>
                        <input type="email" value="<?=$user['email']?>" name="emailcompra" class="stInput" required>
                    </div>
                    <div class="col-sm-12">
                        <label for="email" class="nInput">Nome Completo: </label>
                        <input type="text" value="<?=$user['nome']?>" name="nomecompra" class="stInput" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="cpf" class="nInput">CPF/CNPJ: </label>
                        <input class="stInput" value="<?=$user['cpfcompra']?>" type="number" name="cpfcompra" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="phone" class="nInput">Telefone: </label>
                        <input class="stInput" value="<?=$user['telefone']?>" type="tel" name="telefonecompra" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="nascimento" class="nInput">Data de nascimento: </label>
                        <input class="stInput" value="<?=$user['nascimento']?>" type="date" name="nascimento" required>
                    </div>
                </div>
    
                <h4 style="font-weight: 700; margin-top: 15px;">Endereço</h4>
                <hr style="border: 1px solid; border-color: #adadad;">
    
                <div class="row">
                    <div class="col-sm-4">
                        <label for="CEP" class="nInput">CEP: </label>
                        <input class="stInput" value="<?=$user['cep']?>" type="number" name="CEP" required>
                    </div>
                    <a href="http://www.buscacep.correios.com.br/sistemas/buscacep/default.cfm" style="margin-top: 50px">Não sabe o seu CEP? Consulte Aqui</a>
                    <div class="col-sm-12">
                        <label for="endereco" class="nInput">Endereço: </label>
                        <input class="stInput" value="<?=$user['endereco']?>" type="text" name="endereco" required>
                    </div>
    
                    <div class="col-sm-4">
                        <label for="numeroCasa" class="nInput">Número: </label>
                        <input class="stInput" value="<?=$user['numerocasa']?>" type="number" name="numeroCasa" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="complementoCasa" class="nInput">Complemento: </label>
                        <input class="stInput" value="<?=$user['complemento']?>" type="text" name="complemento" required>
                    </div>
                    <div class="col-sm-4">
                        <label for="bairroCasa" class="nInput">Bairro: </label>
                        <input class="stInput" value="<?=$user['bairro']?>" type="text" name="bairro" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="city" class="nInput">Cidade: </label>
                        <input class="stInput" value="<?=$user['cidade']?>" type="text" name="cidade" required>
                    </div>
    
                    <div class="col-sm-6">
                        <label for="estado" class="nInput">Estado: </label>
                        <input class="stInput" value="<?=$user['estadocompra']?>" list="estados" name="estadocompra" required>
                        <datalist id="estados">
                            <option value="Acre (AC)">
                            <option value="Alagoas (AL)">
                            <option value="Amapá (AP)">
                            <option value="Amazonas (AM)">
                            <option value="Bahia (BA)">
                            <option value="Ceará (CE)">
                            <option value="Distrito Federal (DF)">
                            <option value="Espírito Santo (ES)">
                            <option value="Goiás (GO)">
                            <option value="Maranhão (MA)">
                            <option value="Mato Grosso (MT)">
                            <option value="Mato Grosso do Sul (MS)">
                            <option value="Minas Gerais (MG)">
                            <option value="Pará (PA)">
                            <option value="Paraíba (PB)">
                            <option value="Paraná (PR)">
                            <option value="Pernambuco (PE)">
                            <option value="Piauí (PI)">
                            <option value="Rio de Janeiro (RJ)">
                            <option value="Rio Grande do Norte (RN)">
                            <option value="Rio Grande do Sul (RS)">
                            <option value="Rondônia (RO)">
                            <option value="Roraima (RR)">
                            <option value="Santa Catarina (SC)">
                            <option value="São Paulo (SP)">
                            <option value="Sergipe (SE)">
                            <option value="Tocantins (TO)">                           
                        </datalist>
                    </div>
                </div><br>
                <a href="<?= base_url('index.php/page/lista_car') ?>"><i class="fas fa-cart-arrow-down"></i> Voltar ao carrinho</a>
                <button class="btn btn-primary btn-sm ml-5" type="submit"><i class="fas fa-credit-card"></i> Fazer o pagamento</button>
          <hr></div>
             </form>
                        <!-- Fim do: Form dados -->


                      <!--      INICIO DO:   FORM DO CARRINHO              -->


    