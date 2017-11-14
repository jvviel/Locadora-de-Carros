<?php
   require_once 'conexao.php'; 

   $id = trim($_POST['id']);
   $cliente = trim($_POST['txtCli']); 
   $carro = trim($_POST['txtCar']);
   $tempo = trim($_POST['txtTempo']); 
   $data = trim($_POST['txtData']);
   $valor = trim($_POST['txtValor']); 
 
   if (!empty($cliente) && !empty($carro) && !empty($tempo) && !empty($data) && !empty($valor)){
      $con = open_conexao(); 
      selectDb(); 

      $sql = "UPDATE carros_pedidos SET cliente='$cliente', 
             carro='$carro', tempo ='$tempo', data='$data', valor_ped='$valor'
             WHERE id_ped='$id';";

      $upd = mysql_query($sql); 
      close_conexao($con); 
      
      if ($upd==FALSE)
        $msg= "Erro na alteração de Pedido...<BR/>";
      else {
          $msg = "Foi alterado ". mysql_affected_rows() . " registro";
          unset($id, $cliente, $carro, $tempo, $data, $valor); 
      }
      echo $msg;
   }
   header("location: listarPedidos.php"); 
?> 