<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>

    <!-- Include cabeçalho -->

    <?php
    include_once("../fixos/cabecalho_fixo.php");
  
    require_once __RAIZ__ . '../Model/Brinquedo.php';

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    $id_brinquedo = unserialize($_SESSION['editar_brinquedo'])->getId_brinquedo();
    $nome = unserialize($_SESSION['editar_brinquedo'])->getNome();
    $tipo = unserialize($_SESSION['editar_brinquedo'])->getTipo();
    $preco = unserialize($_SESSION['editar_brinquedo'])->getPreco();
    ?>
    <head>
    <div class="w3-main" style="margin-left:340px;margin-right:40px">
<div class="w3-container" style="margin-top:80px" id="menu">
  </div>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">       

        <link rel="stylesheet" type="text/css" href="../css/style.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>


    </head>

    <body>

        <div class="wrapper fadeInDown">
            

                <!-- Icone inserido -->
                <div class="fadeIn first">
                    <h3><?php echo $id_brinquedo==null?"Cadastro":"Edição" ?> de Brinquedos</h3>
                </div>


                <!-- Formulário de login -->
                <form method="post" action="../../../Controller/BrinquedoController.php?acao=cadastrarBrinquedo">


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="hidden"  class="form-control" id="id_brinquedo" name="id_brinquedo"  value="<?php echo $id_brinquedo; ?>">
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo:</label>
                        <div class="col-sm-10">

                            <select name="tipo" id="tipo" class="form-control">
                                <option value="barbie">Barbie</option>
                                <option value="urso">Pelúcias</option>
                                <option value="carro">Carrinhos</option>
                                <option value="funko">Funkos</option>
                                <option value="tab">Tabuleiros</option>
                              
                            </select>                            

                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nome" class="col-sm-2 col-form-label">Nome:</label>
                        <div class="col-sm-10">
                            <input type="text"  class="form-control" id="nome" name="nome" placeholder="Insira o nome" value="<?php echo $nome; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="preco" class="col-sm-2 col-form-label">Preço:</label>
                        <div class="col-sm-10">
                            <input type="number"  class=" form-control" min="1" step="any"  id="preco" name="preco" placeholder="Insira o preço (xx.xx)"  value="<?php echo $preco; ?>">
                        </div>
                    </div>

                    <input type="submit" class="fadeIn second" value="<?php echo $id_brinquedo==null?"Cadastrar":"Editar" ?>" />
</form>
            </div>


</body>

</html>
