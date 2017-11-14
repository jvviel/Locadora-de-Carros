<?php
 /*session_start();
if (!isset($_SESSION['user'])) //AND (!isset($_SESSION[nome])) ) 
Header("Location: index.html");*/

require_once 'conexao.php';
$con = open_conexao();
selectDb();
$rs = mysql_query("SELECT * FROM `carros` INNER JOIN marca on carros.marca = marca.id_marca;");
close_conexao($con);
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listagem de Carros</title>
</head>

<body class="container" background="ListarC.jpg">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <font color="white"><h1>Listagem de Carros</h1></font>
    <br/>
    <button type="button" class="btn btn-primary"
     onclick="javascript:location.href='insereCarros.php'">Novo</button>

    <button type="button" class="btn btn-warning"
     onclick="javascript:location.href='Menu.html'">Menu</button> 

     <br>

    <div class="row col-md-7" style="border:10px">
    <table  class="table table-hover">
        <tr bgcolor="yellow">
           <th widht="80" align="center">ID</th> 
           <th widht="150" align="right">Modelo</th>]
           <th widht="150" align="right">Marca</th>
           <th widht="80" align="right">Ano</th> 
           <th widht="80" align="right">Disponivel</th>
           <th widht="80" align="right">Valor</th>
           <th widht="80" align="right">Editar</th>
           <th widht="80" align="right">Excluir</th>
        </tr>
        <?php while ( $row = mysql_fetch_array($rs) ) { ?> 
            <tr class="active">
                <td class="info"><?php echo $row['id'] ?></td>
                <td><?php echo $row['modelo'] ?></td>
                <td><?php echo $row['descricao'] ?></td>
                <td><?php echo $row['ano'] ?></td>
                <td><?php echo $row['disponivel'] ?></td>
                <td><?php echo $row['valor'] ?></td>
                <td>
                    <button type="button" class="btn btn-warning"
                     onclick="javascript:location.href='frmEdtCar.php?id=' 
                      + <?php echo $row['id'] ?> ">
                     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>                 
                </td>  
                <td>
                    <button type="button" class="btn btn-danger"
                     onclick="javascript:location.href='frmRemCar.php?id=' 
                      + <?php echo $row['id'] ?> ">
                     <span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
                    </button>                 
                </td>                    
            </tr>
        <?php 
    } ?>
        
    </table>
        </div>
</body>



</html>     