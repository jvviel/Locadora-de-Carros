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
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="bootstrap/css/style.css">
       <title>Remoção de Clientes</title>
    </head>
    <body class="container">   
        <h1>Remover Cliente</h1>
        <form id="frmRemCli" name="frmRemCli" method="post" action="remCli.php">
          <div class="form-group">
            <label for="lblId">
               <span class="textoBold">ID:</span>
               <span class="textoNormal"><?php echo $id?></span>
            </label>
            <input type="hidden" name="id"  value="<?php echo $id?>">
          </div>
          <div class="form-group">
            <label for="lblNome">
               <span class="textoBold">Nome:</span>
               <span class="textoNormal"><?php echo $nome;?></span>
            </label>
          </div>
          <div class="form-group">
            <label for="lblTel">
               <span class="textoBold">Telefone:</span>
               <span class="textoNormal"><?php echo $tel;?></span>
            </label>
          </div>
          <div class="form-group">
            <label for="lblCid">
               <span class="textoBold">Cidade:</span>
               <span class="textoNormal"><?php echo $cid;?></span>
            </label>
          </div>          
          <div class="form-group">
            <label for="lblEst">
               <span class="textoBold">Estado:</span>
               <span class="textoNormal"><?php echo $est;?></span>
            </label>
          </div>

          <input id="bt_Rem" type="submit" value="Remover" class="btn btn-success"/>
         
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='listarClientes.php'">Voltar</button>


    </body>    
</html>