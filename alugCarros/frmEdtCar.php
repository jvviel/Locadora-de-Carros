<?php
   require_once 'conexao.php'; 
   
   $con = open_conexao(); 
   selectDb(); 
   //recuperar valor passado por get
   $id = trim($_REQUEST['id']);
    //buscar no banco de dados
   $rs = mysql_query("SELECT * FROM carros WHERE id=".$id);
   $rc = mysql_query("SELECT * FROM `marca`;");
   close_conexao($con); 
   
   $row = mysql_fetch_array($rs); 
   $modelo = $row['modelo']; 
   $marca = $row['marca'];
   $ano = $row['ano'];
   $disp = $row['disponivel']; 
   $val = $row['valor'];  
?>

<html>
    <head>
       <meta charset="UTF-8"> 
       <title>Alteração de Carros</title>
    </head>
    <body class="container">   
        <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
        <h1>Alterar Dados de Carro</h1>
        
        <form id="frmEdCar" name="frmEdCar" method="post" action="edtCar.php">
          <div class="form-group">
            <label for="lblId">ID: <?php echo $id?> </label>
            <input type="hidden" name="id"  value="<?php echo $id?>">
          </div>

          <div class="form-group">
            <label for="lblMod">Modelo: </label>
            <input type="text" class="form-control" id="txtMod" name="txtMod" value="<?php echo $modelo?>" placeholder="Informe a modelo..." required="">
          </div>
          
           <div>
            <label for="lblMod">Marca: </label><br>
            <select id="txtMarca" name="txtMarca"> 
               <option> Selecione uma opção</option>
               <?php
               while($rw = mysql_fetch_array($rc) ){                     
                echo "<option value={$rw['id_marca']}>{$rw['descricao']}</option>";
                 }
               ?>

            </select> 
          </div>

          <div class="form-group">
            <br><label for="lblAno">Ano: </label>
            <input  maxlength="4" type="text" class="form-control" id="txtAno" name="txtAno" value="<?php echo $ano?>" placeholder="Máximo 4 caracteres" required="">
          </div>
          <div class="form-group">
            <label for="lblDisp">Disponível: </label>
            <input type="text" class="form-control" id="txtDisp" name="txtDisp" value="<?php echo $disp?>" placeholder="Quantidade disponível"
            required="">
          </div>
          <div class="form-group">
            <label for="lblValor">Valor R$: </label>
            <input type="text" class="form-control" id="txtVal" name="txtVal" value="<?php echo $val?>" placeholder="Informe um número real" required="">
          </div>   
        
          <input id="bt_Atl" type="submit" value="Atualizar" class="btn btn-success"/>
         
          <button id="bt_voltar" type="button" class="btn btn-danger"
          onclick="javascript:location.href='listarCarros.php'">Voltar</button>

        
        </form>
    </body>
</html>