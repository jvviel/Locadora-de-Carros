<?php
  require_once 'conexao.php'; 
  $con = open_conexao(); 
  selectDb();   
  $rs = mysql_query("SELECT * FROM `carros_pedidos` INNER JOIN clientes on carros_pedidos.cliente = clientes.id_cli 
                     INNER JOIN carros on carros_pedidos.carro = carros.id;"); 
  close_conexao($con); 
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Listagem de Pedidos</title>
</head>
<body class="container" background="ListarP.jpg">
    <font color="white"><h1>Manter Pedidos</h1></font>
    <br/>
    <button type="button" class="btn btn-success"
     onclick="javascript:location.href='inserePedidos.php'">Novo</button>
    
    <button type="button" class="btn btn-warning"
     onclick="javascript:location.href='Menu.html'">Menu</button><br> 


    <br>
    <div class="row col-md-8" style="border:10px">
    <table  class="table table-hover">
        <tr bgcolor="yellow">
           <th widht="80" align="center">ID</th> 
           <th widht="150" align="center">Cliente</th>
           <th widht="80" align="right">Carro</th>
           <th widht="80" align="right">Tempo</th>
           <th widht="80" align="right">Data</th>
           <th widht="80" align="right">Valor</th>
           <th widht="80" align="right">Editar</th>
           <th widht="80" align="right">Excluir</th>
        </tr>
        <?php while ($row = mysql_fetch_array($rs)) { ?> 
            <tr class="active">
                <td class="info"><?php echo $row['id_ped'] ?></td>
                <td><?php echo $row['nome'] ?></td>
                <td><?php echo $row['modelo']?></td>
                <td><?php echo $row['tempo']?></td>
                <td><?php echo (new DateTime($row['data']))->format("d-m-Y");?></td>
                <td><?php echo $row['valor_ped']?></td>
                <td>
                    <button type="button" class="btn btn-warning"
                     onclick="javascript:location.href='frmEdtPed.php?id=' 
                      + <?php echo $row['id_ped'] ?> ">
                     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>                 
                </td>  
                <td>
                    <button type="button" class="btn btn-danger"
                     onclick="javascript:location.href='frmRemPed.php?id=' 
                      + <?php echo $row['id_ped'] ?> ">
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