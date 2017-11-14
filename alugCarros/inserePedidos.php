<?php

require_once 'conexao.php';
$con = open_conexao();
selectDb();
$rs = mysql_query("SELECT * FROM `clientes`;");
$rw = mysql_query("SELECT * FROM `carros`;");

close_conexao($con);
?>

<html>
    <head>
      <meta charset="UTF-8"> 
        <title>Inserir Novo Pedido</title>
    </head>
    <body class="container">   
        
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <h1>Cadastrar Pedido</h1>
        <form id="frmCadCar" name="frmCadCar" method="post" action="insPed.php">

          <div>
            <br><label for="lblCli">Cliente: </label><br>
            <select id="txtCli" name="txtCli"> 
               <option> Selecione um Cliente</option>
               <?php
               while($row = mysql_fetch_array($rs) ){                     
                echo "<option value={$row['id_cli']}>{$row['nome']}</option>";
                 }
               ?>
            </select>
          </div>
        
          <div>
            <br><label for="lblCar">Carro: </label><br>
            <select id="txtCar" name="txtCar"> 
               <option> Selecione uma opção</option>
               <?php
               while($row2 = mysql_fetch_array($rw) ){                     
                echo "<option value={$row2['id']}>{$row2['modelo']}</option>";
                 }
               ?>
            </select>
          </div>

          <div class="form-group">
            <br><label for="lblTempo">Tempo: </label>
            <input  maxlength="4" type="text" class="form-control" id="txTempo" name="txtTempo" placeholder="Tempo de locação do veículo em dias..." required="">
          </div>
          <div class="form-group">
            <label for="lblDisp">Data: </label>
            <input type="date" class="form-control" id="txData" name="txtData" required="">
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