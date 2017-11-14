<?php
   require_once 'conexao.php'; 

   $nome = trim($_POST['txtNome']); 
   $telefone = trim($_POST['txtTel']);
   $cidade = trim($_POST['txtCid']); 
   $estado = trim($_POST['txtEst']);  
 
   if (!empty($nome) && !empty($telefone) && !empty($cidade) && !empty($estado)){
      $con = open_conexao(); 
      selectDb(); 

      $sql = "INSERT INTO clientes
               (nome, telefone, cidade, estado)
        VALUES ('$nome', '$telefone', '$cidade', '$estado');";  
      $ins = mysql_query($sql); 

      if ($ins==FALSE)
        $msg= "Erro na insercao de Clientes...<BR/>";
      else {
          $msg = "Foi inserido ". mysql_affected_rows() . " registro";
          unset($nome, $telefone, $cidade, $estado); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: listarClientes.php"); 
?> 