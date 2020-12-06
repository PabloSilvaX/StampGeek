<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= base_url('assets/Styles/stylesConfirmação.css')?>">
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
                    <div class="dot">
                        <p class="dotNumber">2</p>
                    </div>
                    <p class="dotText">Pagamento</p>
                </div>
                <div class="p3 col-md-2">
                    <div class="dot" style="background-color: orange;">
                        <p class="dotNumber">3</p>
                    </div>
                    <p class="dotText">Confirmação</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row" style=" justify-content: space-between;">
            <div class="col-lg-5"
                style="border: 1px solid; margin-top: 35px; padding: 15px; border-radius: 5px; height:450px;">
                <i class="fas fa-user" style="font-size: 32px"></i>
                <h4 style="display: inline-block; padding-left: 7px; font-weight: 500; font-size: 22px">Identificação do
                    cliente</h4>
                    <form class="col-10  ftco-animate " type="hidden" method="POST" action="<?=base_url('index.php/page/cadastrar_pedido')?>">
                <p style="margin-top: 25px; margin-bottom: 10px">NOME: <?=$user['nomecompra']?></p>
                <p style="margin-bottom: 10px">E-MAIL: <?=$user['emailcompra']?></p>
                <p style="margin-bottom: 10px">TELEFONE: <?=$user['telefonecompra']?></p>
                <p style="margin-bottom: 10px">ENDEREÇO: <?=$user['endereco']?></p>
                <p style="margin-bottom: 10px">COMPLEMENTO: <?=$user['complemento']?></p>
                <p style="margin-bottom: 10px">BAIRRO: <?=$user['bairro']?></p>
                <p style="margin-bottom: 10px">CIDADE: <?=$user['cidade']?></p>
                <p style="margin-bottom: 50px">CEP: <?=$user['cep']?></p>


                <input type="hidden" value="<?=$user['id']?>" id="form1" name="idcliente" class="form-control" required>
                <input type="hidden" value="<?=$user['nomecompra']?>" id="form1" name="nomecliente" class="form-control" required>
                <input type="hidden" value="<?=$user['emailcompra']?>" id="form1" name="email" class="form-control" required>
                <input type="hidden" value="<?=$user['telefonecompra']?>" id="form1" name="telefone" class="form-control" required>
                <input type="hidden" value="<?=$user['endereco']?>" id="form1" name="endereco" class="form-control" required>
                <input type="hidden" value="<?=$user['complemento']?>" id="form1" name="complemento" class="form-control" required>
                <input type="hidden" value="<?=$user['bairro']?>" id="form1" name="bairro" class="form-control" required>
                <input type="hidden" value="<?=$user['cidade']?>" id="form1" name="cidade" class="form-control" required>
                <input type="hidden" value="<?=$user['cep']?>" id="form1" name="cep" class="form-control" required>
                <input type="hidden" value="<?=$user['cpfcompra']?>" id="form1" name="cpf" class="form-control" required>
                <input type="hidden" value="<?=$user['numerocasa']?>" id="form1" name="numerocasa" class="form-control" required>
                <input type="hidden" value="..." id="form1" name="etapaloja" class="form-control" required>
                <input type="hidden" value="..." id="form1" name="motivo" class="form-control" required>
                <input type="hidden" value="..." id="form1" name="motivocli" class="form-control" required>
                <input type="hidden" value="..." id="form1" name="data" class="form-control" required>


                <a style="margin-left:73%;" href="<?=base_url('index.php/page/etapa2/')?><?=$user['id']?>"><p>Alterar Endereço</p></a>
            </div>
