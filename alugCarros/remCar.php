<?php
   require_once 'conexao.php'; 

   $id = trim($_POST['id']);
  
   if (!empty($id)){
      $con = open_conexao(); 
      selectDb(); 
      $sql = "DELETE FROM carros WHERE id='$id';";

      $rem = mysql_query($sql); 
      close_conexao($con); 

      if ($rem==FALSE)
        $msg= "Erro na remoção de Carro...<BR/>";
      else {
          $msg = "Foi removido ". mysql_affected_rows() . " registro";
          unset($id); 
      }
      echo $msg;
   }
   header("location: listarCarros.php"); 
?> 