<?php
   require_once 'conexao.php'; 

   $cliente = trim($_POST['txtCli']); 
   $carro = trim($_POST['txtCar']);
   $tempo = trim($_POST['txtTempo']); 
   $data = trim($_POST['txtData']); 
   $val = trim($_POST['txtVal']); 
 
   if (!empty($cliente) && !empty($carro) && !empty($tempo) && !empty($data) && !empty($val)){
      $con = open_conexao(); 
      selectDb(); 

      $sql = "INSERT INTO carros_pedidos
               (cliente, carro, tempo, data, valor_ped)
        VALUES ('$cliente', '$carro', '$tempo', '$data', '$val');";  
      $ins = mysql_query($sql); 

      if ($ins==FALSE)
        $msg= "Erro na insercao de Carros...<BR/>";
      else {
          $msg = "Foi inserido ". mysql_affected_rows() . " registro";
          unset($cliente, $carro, $tempo, $data, $val); 
      }
      close_conexao($con); 
      echo $msg;
   }
   header("location: listarPedidos.php"); 
?> 