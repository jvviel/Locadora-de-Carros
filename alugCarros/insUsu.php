<?php
   require_once 'conexao.php'; 

   $nome = trim($_POST['idNome']); 
   $usuario = trim($_POST['idUsuario']); 
   $senha = md5 (trim($_POST['idSenha'])); 

 
   if (!empty($nome) && !empty($usuario) && !empty($senha)){
      $con = open_conexao(); 
      selectDb(); 
      $sql = "INSERT INTO usuario 
               (nome, usuario, senha)
        VALUES ('$nome', '$usuario', '$senha');";  
      $ins = mysql_query($sql); 

      if ($ins==FALSE)
        $msg= "Erro na insercao de Pedidos...<BR/>";
      else {
          $msg = "Foi inserido ". mysql_affected_rows() . " registro";
          unset($nome, $usuario, $senha); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: Menu.html");
?> 