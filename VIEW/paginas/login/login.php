<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- Include cabeçalho -->

    <?php
    include_once "../fixos/cabecalho_fixo.php";
    ?>
    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       

        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

        <!--Icones-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>

    <body>


        <div class="wrapper fadeInDown">


            <div id="formContent">

                <?php
                if (isset($_SESSION['mensagemSistema'])):
                    $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
                    ?>

                    <div class="alert alert-danger" role="alert">
                        <strong><?php echo $mensagem; ?></strong> 
                    </div>

                    <?php
                    unset($_SESSION['mensagemSistema']);
                endif;
                ?>

                <!-- Icone -->
                <div class="fadeIn first">
                    <img src="../../imagens/icone_usuario.png" id="icon" alt="User Icon" />
                </div>

                <!-- Formulário de login -->
                <form method="post" action="../../../Controller/UsuarioController.php?acao=efetuarLogin">
                    <!--Atenção: a variável preenchida na seção e enviada para o controller é a que está no 'name' -->
                    <input type="text" id="loginInserido" class="fadeIn second" name="loginInserido" placeholder="insira o login (email)">
                    <input type="password" id="senhaLogin" class="fadeIn third" name="senhaLogin" placeholder="insira a senha">
                    <input type="submit" class="fadeIn fourth" value="Logar">
                </form>

                <!-- Criar conta -->
                <div id="formFooter">
                    <a class="underlineHover" href="cadastro_usuario.php">Criar conta</a>
                </div>

            </div>
        </div>

    </body>
</html>
