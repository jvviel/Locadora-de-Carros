<?php
   require_once 'conexao.php'; 
   
   $con = open_conexao(); 
   selectDb(); 
   //recuperar valor passado por get
   $id = trim($_REQUEST['id']);
    //buscar no banco de dados
   $rs = mysql_query("SELECT * FROM carros_pedidos WHERE id_ped=".$id);
   $rc = mysql_query("SELECT * FROM `clientes`;");
   $rt = mysql_query("SELECT * FROM `carros`;");
   close_conexao($con); 
   
   $row = mysql_fetch_array($rs); 
   $cliente = $row['cliente']; 
   $carro = $row['carro'];
   $tempo = $row['tempo'];
   $data = $row['data'];
   $valor = $row['valor_ped'];  
?>

<html>
    <head>
       <meta charset="UTF-8"> 
       <title>Alteração de Pedidos</title>
    </head>
    <body class="container">   
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <h1>Alterar Dados de Pedidos</h1>
        
        <form id="frmEdtPed" name="frmEdtPed" method="post" action="edtPed.php">
          <div class="form-group">
            <label for="lblId">ID: <?php echo $id?> </label>
            <input type="hidden" name="id"  value="<?php echo $id?>">
          </div>

          <div>
            <label for="lblCli">Cliente: </label><br>
            <select id="txtCli" name="txtCli" required=""> 
               <option> Selecione o Cliente</option>
               <?php
               while($rw = mysql_fetch_array($rc) ){                     
                echo "<option value={$rw['id_cli']}>{$rw['nome']}</option>";
                 }
               ?>
            </select> 
          </div>

          <div>
            <br><label for="lblCar">Carro: </label><br>
            <select id="txtCar" name="txtCar"> 
               <option> Selecione o Carro</option>
               <?php
               while($rx = mysql_fetch_array($rt) ){                     
                echo "<option value={$rx['id']}>{$rx['modelo']}</option>";
                 }
               ?>
            </select> 
          </div>

          <div class="form-group">
            <br><label for="lblTempo">Tempo(dias): </label>
            <input maxlength="4" type="text" class="form-control" id="txtTempo" name="txtTempo" value="<?php echo $tempo?>">
          </div>

          <div class="form-group">
            <label for="lblData">Data: </label>
            <input type="date" class="form-control" id="txtData" name="txtData" value="<?php echo $data?>">
          </div>
          
          <div class="form-group">
            <label for="lblValor">Valor: </label>
            <input type="text" class="form-control" id="txtValor" name="txtValor" value="<?php echo $valor?>">
          </div>
          
        
          <input id="bt_Atl" type="submit" value="Atualizar" class="btn btn-success"/>
         
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='listarPedidos.php'">Voltar</button>

        
        </form>
    </body>
</html>