<?php
    require_once 'conexao.php';
    $con = open_conexao();
    selectDb();
    //recuperar valor passado por get
    $id = trim($_REQUEST['id']);
     //buscar no banco de dados
    $rs = mysql_query("SELECT * FROM carros_pedidos INNER JOIN clientes on (carros_pedidos.cliente = clientes.id_cli) WHERE id_ped=".$id);
    close_conexao($con);
    
    $row = mysql_fetch_array($rs);
    $cliente = $row['nome'];
    $carro = $row['carro'];
    $tempo = $row['tempo'];
    $data = $row['data'];
    $valor = $row['valor_ped'];
?>

<html>
    <head>
       <meta charset="UTF-8"> 
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="bootstrap/css/style.css">
       <title>Remoção de Pedidos</title>
    </head>
    <body class="container">   
        <h1>Remover Pedido</h1>
        <form id="frmRemPed" name="frmRemPed" method="post" action="remPed.php">
          <div class="form-group">
            <label for="lblId">
               <span class="textoBold">ID:</span>
               <span class="textoNormal"><?php echo $id?></span>
            </label>
            <input type="hidden" name="id"  value="<?php echo $id?>">
          </div>
          <div class="form-group">
            <label for="lblCli">
               <span class="textoBold">Cliente:</span>
               <span class="textoNormal"><?php echo $cliente;?></span>
            </label>
          </div>
          <div class="form-group">
            <label for="lblCarro">
               <span class="textoBold">Carro:</span>
               <span class="textoNormal"><?php echo $carro;?></span>
            </label>
          </div>
          <div class="form-group">
            <label for="lblTempo">
               <span class="textoBold">Tempo:</span>
               <span class="textoNormal"><?php echo $tempo;?></span>
            </label>
          </div>          
          <div class="form-group">
            <label for="lblVal">
               <span class="textoBold">Valor:</span>
               <span class="textoNormal"> R$ <?php echo $valor;?></span>
            </label>
          </div>

          <input id="bt_Rem" type="submit" value="Remover" class="btn btn-success"/>
         
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='listarPedidos.php'">Voltar</button>


    </body>    
</html>