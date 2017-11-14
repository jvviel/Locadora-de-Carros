<?php
   require_once 'conexao.php'; 

   $id = trim($_POST['id']);
   $nome = trim($_POST['txtNome']); 
   $tel = trim($_POST['txtTel']);
   $cid = trim($_POST['txtCid']); 
   $est = trim($_POST['txtEst']);  
 
   if (!empty($nome) && !empty($tel) && !empty($cid) && !empty($est)){
      $con = open_conexao(); 
      selectDb(); 

      $sql = "UPDATE clientes SET nome='$nome', 
             telefone='$tel', cidade ='$cid', estado='$est'
             WHERE id_cli='$id';";

      $upd = mysql_query($sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Clientes...<BR/>";
      else {
          $msg = "Foi alterado ". mysql_affected_rows() . " registro";
          unset($id, $nome, $tel, $cid, $est); 
      }
      echo $msg;
   }
   header("location: listarClientes.php"); 
?> 