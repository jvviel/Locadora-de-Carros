<?php

require_once 'conexao.php';
$con = open_conexao();
selectDb();
$rs = mysql_query("SELECT * FROM `marca` ORDER BY descricao;");
close_conexao($con);
?>

<html>
    <head>
      <meta charset="UTF-8"> 
        <title>Inserir Novo Carro</title>
    </head>
    <body class="container">   
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <h1>Cadastrar Carro</h1>
        <form id="frmCadCar" name="frmCadCar" method="post" action="insCar.php">
       
          <div class="form-group">
            <label for="lblMod">Modelo: </label>
            <input type="text" class="form-control" id="txtMod" name="txtMod" placeholder="Informe o Modelo..." required="">
          </div>
        
          <div>
            <label for="lblMod">Marca: </label><br>
            <select id="txtMarca" name="txtMarca"> 
               <option> Selecione uma opção</option>
               <?php
               while($row = mysql_fetch_array($rs) ){                     
                echo "<option value={$row['id_marca']}>{$row['descricao']}</option>";
                 }
               ?>

            </select> 
            
          </div>

          <div class="form-group">
            <br><label for="lblAno">Ano: </label>
            <input  maxlength="4" type="text" class="form-control" id="txAno" name="txtAno" placeholder="Formato /1999" required="">
          </div>
          <div class="form-group">
            <label for="lblDisp">Disponível: </label>
            <input type="text" class="form-control" id="txtDisp" name="txtDisp" placeholder="Informe a quantidade disponível" required="">
          </div>
          <div class="form-group">
            <label for="lblVal">Valor R$: </label>
            <input type="text" class="form-control" id="txtVal" name="txtVal" placeholder="Informe um número real" required="">
          </div>   
        
          
          <input  id="bt_cadastrar" type="submit" value="Cadastrar" class="btn btn-success"/>
          <input  id="bt_limpar" type="reset" value="Limpar" class="btn btn-warning"/>
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='Menu.html'">Voltar</button>

    
        </form>
    
    </body>
</html>