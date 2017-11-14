<?php
   require_once 'conexao.php'; 
   
   $con = open_conexao(); 
   selectDb(); 
   //recuperar valor passado por get
   $id = trim($_REQUEST['id']);
    //buscar no banco de dados
   $rs = mysql_query("SELECT * FROM clientes WHERE id_cli=".$id);
   close_conexao($con); 
   
   $row = mysql_fetch_array($rs); 
   $nome = $row['nome']; 
   $tel = $row['telefone'];
   $cid = $row['cidade'];
   $est = $row['estado'];   
?>

<html>
    <head>
       <meta charset="UTF-8"> 
       <title>Alteração de Clientes</title>
    </head>
    <body class="container">   
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <h1>Alterar Dados de Cliente</h1>
        
        <form id="frmEdCar" name="frmEdCar" method="post" action="edtCli.php">
          <div class="form-group">
            <label for="lblId">ID: <?php echo $id?> </label>
            <input type="hidden" name="id"  value="<?php echo $id?>">
          </div>

          <div class="form-group">
            <label for="lblNome">Nome: </label>
            <input type="text" class="form-control" id="txtNome" name="txtNome" value="<?php echo $nome?>" placeholder="Informe a Nome..." required="">
          </div>

          <div class="form-group">
            <label for="lblTel">Telefone: </label>
            <input type="tel" class="form-control" id="txtTel" name="txtTel" value="<?php echo $tel?>" placeholder="Use apenas números" required="">
          </div>

          <div class="form-group">
            <label for="lblCid">Cidade: </label>
            <input type="text" class="form-control" id="txtCid" name="txtCid" value="<?php echo $cid?>" placeholder="Informe a cidade..."
            required="">
          </div>

          <div class="form-group">
            <label for="lblEst">Estado: </label>
            <input type="text" class="form-control" id="txtEst" name="txtEst" value="<?php echo $est?>" placeholder="Informe o UF..." 
            required="">
          </div>   
        
          <input id="bt_Atl" type="submit" value="Atualizar" class="btn btn-success"/>
         
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='listarClientes.php'">Voltar</button>

        
        </form>
    </body>
</html>