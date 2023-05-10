<!DOCTYPE html>
<html>

    <head>

    </head>
    <body>

        <!-- Include cabeçalho -->
        <?php        
        include_once("cabecalho.php");       
        ?>
        
        <header class="w3-container w3-top w3-hide-large w3-red w3-xlarge w3-padding">
         <a href="javascript:void(0)" class="w3-button w3-red w3-margin-right" onclick="w3_open()">☰</a>
         <span>Loja de Brinquedos</span>
        </header>
        <!-- Overlay effect when opening sidebar on small screens -->
        <div class="w3-overlay w3-hide-large" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

         <!-- !PAGE CONTENT! -->
        <div class="w3-main" style="margin-left:340px;margin-right:40px"></div>
        
        <!-- Include menu -->
        <?php
        //include_once("VIEW/paginas/home/home.php");
        ?>
        <?php
        include_once("VIEW/paginas/menu/menu.php");
        ?>

        <!-- Include Sobre -->
        <?php
        //include_once("VIEW/paginas/sobre/sobre.html");
        ?>

        <!-- Include Contato -->
        <?php
        //include_once("VIEW/paginas/contato/contato.php");
        ?>

        <!-- Include rodapé -->
        <?php
       //include_once("VIEW/paginas/fixos/rodape.html");
        ?>


    </body>
</html>
