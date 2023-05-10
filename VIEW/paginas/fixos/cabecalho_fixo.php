<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <head>
        <?php
        include_once '../../../configuracao/Constantes.php';
        require_once __RAIZ__ . '/MODEL/Usuario.php';

        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        
        
        ?>

        <script>
    // Script to open and close sidebar
        function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
        document.getElementById("myOverlay").style.display = "block";
        }
 
        function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
        document.getElementById("myOverlay").style.display = "none";
        }

      // Modal Image Gallery
        function onClick(element) {
        document.getElementById("img01").src = element.src;
        document.getElementById("modal01").style.display = "block";
        var captionText = document.getElementById("caption");
        captionText.innerHTML = element.alt;
        }
        </script>
        
         <!--tentativa de adicionar bootstrap-->
         
         <link rel="stylesheet" type="text/css" href="../css/tabelas.css">
         
         <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        
        <!--Icones-->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        
        <!-- fim -->
        
        <meta charset="UTF-8">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         <title>Loja de Brinquedos</title>
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
         <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins">
         <style>
           body,h1,h2,h3,h4,h5 {font-family: "Poppins", sans-serif}
           body {font-size:16px;}
           .w3-half img{margin-bottom:-6px;margin-top:16px;opacity:0.8;cursor:pointer}
           .w3-half img:hover{opacity:1}
         </style>
          <!--fim de adicionar bootstrap-->
    <body>
            <!-- Sidebar/menu -->
            <nav class="w3-sidebar w3-red w3-collapse w3-top w3-large w3-padding" style="z-index:3;width:300px;font-weight:bold;" id="mySidebar"><br>
            <a href="javascript:void(0)" onclick="w3_close()" class="w3-button w3-hide-large w3-display-topleft" style="width:100%;font-size:22px">Close Menu</a>
            <div class="w3-container">
            <h3 class="w3-padding-64"><b>Loja de <br>Brinquedos</b></h3>
            </div>
     <?php if (!isset($_SESSION['usuario_logado'])) : ?>
            <div class="w3-bar-block">    
            <a href="/Loja_Brinquedos/indexSite.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Menu</a> 
            <a href="/Loja_Brinquedos/Controller/UsuarioController.php?acao=login" class="w3-bar-item w3-button">Login</a>
            </div>         
             <?php 
            elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "ADMINISTRADOR"): ?>
            <div class="w3-bar-block">    
             <a href="/Loja_Brinquedos/indexSite.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Menu</a>                            </div>
             <a href="/Loja_Brinquedos/Controller/UsuarioController.php?acao=logout" class="w3-bar-item w3-button">Logout</a> 

                 <?php
            elseif (unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL"): ?>
            <div class="w3-bar-block">     
            <a href="/Loja_Brinquedos/indexSite.php" onclick="w3_close()" class="w3-bar-item w3-button w3-hover-white">Menu</a>         
            <a href="/Loja_Brinquedos/Controller/CarrinhoController.php?acao=verCarrinho" class="w3-bar-item w3-button">Carrinho</a> 
            <a href="/Loja_Brinquedos/Controller/UsuarioController.php?acao=logout" class="w3-bar-item w3-button">Logout</a> 
            </div>
             <?php endif; ?>
            </nav>
        

    </body>

</html>
