<?php
  require_once 'conexao.php'; 
  $con = open_conexao(); 
  selectDb();   
  $rs = mysql_query("SELECT * FROM `clientes`;"); 
  close_conexao($con); 
?>

<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Listagem de Clientes</title>
</head>
<body class="container" background="ListarCli.jpg">
    <font color="white"><h1>Manter Clientes</h1></font>
    <br/>
    <button type="button" class="btn btn-success"
     onclick="javascript:location.href='insereClientes.html'">Novo</button>
    
    <button type="button" class="btn btn-warning"
     onclick="javascript:location.href='Menu.html'">Menu</button><br> 


    <br>
    <div class="row col-md-7" style="border:10px">
    <table  class="table table-hover">
        <tr bgcolor="yellow">
           <th widht="80" align="center">ID</th> 
           <th widht="150" align="center">Nome</th>
           <th widht="80" align="right">Telefone</th>
           <th widht="80" align="right">Cidade</th>
           <th widht="80" align="right">Estado</th>
           <th widht="80" align="right">Editar</th>
           <th widht="80" align="right">Excluir</th>
        </tr>
        <?php while ($row = mysql_fetch_array($rs)) { ?> 
            <tr class="active">
                <td class="info"><?php echo $row['id_cli'] ?></td>
                <td><?php echo $row['nome'] ?></td>
                <td><?php echo $row['telefone']?></td>
                <td><?php echo $row['cidade']?></td>
                <td><?php echo $row['estado']?></td>
                <td>
                    <button type="button" class="btn btn-warning"
                     onclick="javascript:location.href='frmEdtCli.php?id=' 
                      + <?php echo $row['id_cli'] ?> ">
                     <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                    </button>                 
                </td>  
                <td>
                    <button type="button" class="btn btn-danger"
                     onclick="javascript:location.href='frmRemCli.php?id=' 
                      + <?php echo $row['id_cli'] ?> ">
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