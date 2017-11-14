<?php
   require_once 'conexao.php'; 

   $id = trim($_POST['id']);
   $modelo = trim($_POST['txtMod']); 
   $marca = trim($_POST['txtMarca']);
   $ano = trim($_POST['txtAno']); 
   $disp = trim($_POST['txtDisp']); 
   $val = trim($_POST['txtVal']); 
 
   if (!empty($modelo) && !empty($marca) && !empty($ano) && !empty($disp) && !empty($val)){
      $con = open_conexao(); 
      selectDb(); 

      $sql = "UPDATE carros SET modelo='$modelo', 
             marca='$marca', ano ='$ano', disponivel='$disp', valor='$val'
             WHERE id='$id';";

      $upd = mysql_query($sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Carros...<BR/>";
      else {
          $msg = "Foi alterado ". mysql_affected_rows() . " registro";
          unset($id, $modelo, $marca, $ano, $disp, $val); 
      }
      echo $msg;
   }
   header("location: listarCarros.php"); 
?> 