<?php
   require_once 'conexao.php'; 

   $modelo = trim($_POST['txtMod']); 
   $marca = trim($_POST['txtMarca']);
   $ano = trim($_POST['txtAno']); 
   $disp = trim($_POST['txtDisp']); 
   $val = trim($_POST['txtVal']); 
 
   if (!empty($modelo) && !empty($marca) && !empty($ano) && !empty($disp) && !empty($val)){
      $con = open_conexao(); 
      selectDb(); 

      $sql = "INSERT INTO carros 
               (modelo, marca, ano, disponivel, valor)
        VALUES ('$modelo', '$marca', '$ano', '$disp', '$val');";  
      $ins = mysql_query($sql); 

      if ($ins==FALSE)
        $msg= "Erro na insercao de Carros...<BR/>";
      else {
          $msg = "Foi inserido ". mysql_affected_rows() . " registro";
          unset($modelo, $marca, $ano, $disp, $val); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: listarCarros.php"); 
?> 