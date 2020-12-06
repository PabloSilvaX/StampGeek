<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?=base_url('assets/Styles/stylesIdentificação.css')?>">
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
                <div class="p1 col-sm-2">
                    <div class="dot" style="background-color: orange;" >
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
                    <div class="dot">
                        <p class="dotNumber">3</p>
                    </div>
                    <p class="dotText">Confirmação</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
    <form method="post" enctype="multipart/form-data" class="text-center border border-light p-5">
        <H1 style="text-align: center; margin-top: 50px;">Finalizar Pagamento</H1>
        <p style="text-align: center; font-weight: 400; font-size: 18px;">Em apenas três passos você finaliza a compra de forma rápida e segura.</p>

        <div class="row" style="justify-content: center;">
            <div class="col-md-8" style="border: 1px solid; margin: 50px 15px; padding: 15px;">
                <div class="col-sm-12">
                    <label for="identificacao" class="nInput">Digite seu E-mail, CPF ou CNPJ: </label>
                    <input class="stInput" value="<?= $user['identificacao'] ?>" type="text" name="identificacao" required>

                    <button type="submit" class="btn btn-secondary btn-sm" style="margin-top: 35px; margin-left: 89%;">Continuar</button>
                </div>
            </div>
        </div>
        </form>
    </div>

</body>

</html>