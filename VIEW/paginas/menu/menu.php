<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
require_once __RAIZ__ . '/Model/Brinquedo.php';

?>

<div class="w3-main" style="margin-left:340px;margin-right:40px">
<div class="w3-container" style="margin-top:80px" id="menu">
    <h1 class="w3-jumbo"><b>Escolha seu brinquedo!</b></h1>
    <h1 class="w3-xxxlarge w3-text-red"><b>Faça o seu pedido..</b></h1>
    <hr style="width:50px;border:5px solid red" class="w3-round">
  </div>
        <?php
      
        if (isset($_SESSION['mensagemSistema'])):
            $mensagem = isset($_SESSION['mensagemSistema']) ? $_SESSION['mensagemSistema'] : "";
            ?>

            <div class = "alert alert-info">
                <strong><?php echo $mensagem; ?></strong> 
            </div>

            <?php
            unset($_SESSION['mensagemSistema']);
        endif;
        ?>
    <html>
             <div class="w3-half">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Barbie');" id="myLink">            
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Pelucias');">               
            </a>   
                <a href="javascript:void(0)" onclick="openMenu(event, 'Funkos');">
            </a>         
             </div>
            
             <div class="w3-half">
            <a href="javascript:void(0)" onclick="openMenu(event, 'Carros');" id="myLink">            
            </a> <a href="javascript:void(0)" onclick="openMenu(event, 'Tabuleiros');"> 
            </a>   
                <a href="javascript:void(0)" onclick="openMenu(event, 'Outros');">
            </a>
             </div>


      <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Barbie<img src="VIEW/imagens/barbie.png" style="width:100%" onclick="onClick(this)" alt="Barbie"></div>

        <div id="Barbie" class="w3-container menu w3-padding-32 w3-white">

            <?php
            $registrosObtidos = unserialize($_SESSION['listaBrinquedos']);

            foreach ($registrosObtidos as $brinquedoOBJ) {

                if ($brinquedoOBJ->getTipo() === 'barbie') {
                    ?>

            <h1><b><?php echo $brinquedoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $brinquedoOBJ->getPreco(); ?></span></h1>
               <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
            <a href="/Loja_Brinquedos/Controller/BrinquedoController.php?acao=adicionarCarrinho&id=<?php echo $brinquedoOBJ->getId_brinquedo(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
             <?php endif; ?>       
            <hr>

                    <?php
                }
            }
            ?>          
        </div>

        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pelucias<img src="VIEW/imagens/urso.png" style="width:100%" onclick="onClick(this)" alt="Pelucias"></div>
        <div id="Pelucias" class="w3-container menu w3-padding-32 w3-white">


             <?php
            $registrosObtidos = unserialize($_SESSION['listaBrinquedos']);

            foreach ($registrosObtidos as $brinquedoOBJ) {

                if ($brinquedoOBJ->getTipo() === 'urso') {
                    ?>

            <h1><b><?php echo $brinquedoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $brinquedoOBJ->getPreco(); ?></span></h1>
                <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
            <a href="/Loja_Brinquedos/Controller/BrinquedoController.php?acao=adicionarCarrinho&id=<?php echo $brinquedoOBJ->getId_brinquedo(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
             <?php endif; ?> <!-- comment -->
             <hr>
                    <?php
                }
            }
            ?>      
        </div>
 <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Funkos<img src="VIEW/imagens/funko.png" style="width:100%" onclick="onClick(this)" alt="Funkos"></div>
        <div id="Funkos" class="w3-container menu w3-padding-32 w3-white">

             <?php
            $registrosObtidos = unserialize($_SESSION['listaBrinquedos']);

            foreach ($registrosObtidos as $brinquedoOBJ) {

                if ($brinquedoOBJ->getTipo() === 'funko') {
                    ?>

            <h1><b><?php echo $brinquedoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $brinquedoOBJ->getPreco(); ?></span></h1>
               <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
            <a href="/Loja_Brinquedos/Controller/BrinquedoController.php?acao=adicionarCarrinho&id=<?php echo $brinquedoOBJ->getId_brinquedo(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
             <?php endif; ?>    <hr>

                    <?php
                }
            }
            ?>      
        </div>
 <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Carros<img src="VIEW/imagens/carrinho.png" style="width:100%" onclick="onClick(this)" alt="Barbie"></div>
        <div id="Carros" class="w3-container menu w3-padding-32 w3-white">
             <?php
            $registrosObtidos = unserialize($_SESSION['listaBrinquedos']);

            foreach ($registrosObtidos as $brinquedoOBJ) {

                if ($brinquedoOBJ->getTipo() === 'carro') {
                    ?>

            <h1><b><?php echo $brinquedoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $brinquedoOBJ->getPreco(); ?></span></h1>
                <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
            <a href="/Loja_Brinquedos/Controller/BrinquedoController.php?acao=adicionarCarrinho&id=<?php echo $brinquedoOBJ->getId_brinquedo(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
             <?php endif; ?>   <hr>

                    <?php
                }
            }
            ?>      
        </div>
 <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Tabuleiros<img src="VIEW/imagens/tabuleiro.png" style="width:100%" onclick="onClick(this)" alt="Tabuleiros"></div>        <div id="Tabuleiros" class="w3-container menu w3-padding-32 w3-white">
     <div id="Carros" class="w3-container menu w3-padding-32 w3-white">
             <?php
            $registrosObtidos = unserialize($_SESSION['listaBrinquedos']);

            foreach ($registrosObtidos as $brinquedoOBJ) {

                if ($brinquedoOBJ->getTipo() === 'tab') {
                    ?>

            <h1><b><?php echo $brinquedoOBJ->getNome(); ?></b> <span class="w3-right w3-tag w3-dark-grey w3-round"><?php echo 'R$ ' . $brinquedoOBJ->getPreco(); ?></span></h1>
               <?php if (isset($_SESSION['usuario_logado']) && unserialize($_SESSION['usuario_logado'])->getTipo() == "NORMAL") : ?>
            <a href="/Loja_Brinquedos/Controller/BrinquedoController.php?acao=adicionarCarrinho&id=<?php echo $brinquedoOBJ->getId_brinquedo(); ?>" class="btn btn-danger btn-lg btn-block active" role="button" aria-pressed="true">Comprar</a>                  
             <?php endif; ?>   <hr>

                    <?php
                }
            }
            ?>      
        </div>
     
     
        <br>
    </div>

    </html>


