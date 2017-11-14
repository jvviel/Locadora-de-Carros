<?php
    require_once 'conexao.php';
    $con = open_conexao();
    selectDb();
    //recuperar valor passado por get
    $id = trim($_REQUEST['id']);
     //buscar no banco de dados
    $rs = mysql_query("SELECT * FROM carros WHERE id=".$id);
    close_conexao($con);
    
    $row = mysql_fetch_array($rs);
    $modelo = $row['modelo'];
    $marca = $row['marca'];
    $ano = $row['ano'];
    $disp = $row['disponivel'];
    $val = $row['valor'];
?>

<html>
    <head>
       <meta charset="UTF-8"> 
       <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
       <link rel="stylesheet" href="bootstrap/css/style.css">
       <title>Remoção de Carros</title>
    </head>
    <body class="container">   
        <h1>Remover Carro</h1>
        <form id="frmRemCar" name="frmRemCar" method="post" action="remCar.php">
          <div class="form-group">
            <label for="lblId">
               <span class="textoBold">ID:</span>
               <span class="textoNormal"><?php echo $id?></span>
            </label>
            <input type="hidden" name="id"  value="<?php echo $id?>">
          </div>
          <div class="form-group">
            <label for="lblMod">
               <span class="textoBold">Modelo:</span>
               <span class="textoNormal"><?php echo $modelo;?></span>
            </label>
          </div>
          <div class="form-group">
            <label for="lblMarca">
               <span class="textoBold">Marca:</span>
               <span class="textoNormal"><?php echo $marca;?></span>
            </label>
          </div>
          <div class="form-group">
            <label for="lblAno">
               <span class="textoBold">Ano:</span>
               <span class="textoNormal"><?php echo $ano;?></span>
            </label>
          </div>          
          <div class="form-group">
            <label for="lblVal">
               <span class="textoBold">Valor:</span>
               <span class="textoNormal"> R$ <?php echo $val;?></span>
            </label>
          </div>

          <input id="bt_Rem" type="submit" value="Remover" class="btn btn-success"/>
         
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='listarCarros.php'">Voltar</button>


    </body>    
</html>