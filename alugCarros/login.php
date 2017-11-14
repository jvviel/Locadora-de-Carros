<?php
//recuperar dados do formulário de index.html, informacoes do login
$user = trim($_POST['username']);
$pswd = trim($_POST['password']);
$pwdmd5 = md5($pswd); 
echo $user . " - " . $pswd . " - ". $pwdmd5. "<br/>" ;

//recuperar dados do banco de dados
require_once "conexao.php";
$con = open_conexao();
selectDb();
$sql = "SELECT * FROM usuario where usuario like '$user'";
$rs = mysql_query($sql);
close_conexao($con);
$row = mysql_fetch_array($rs);
echo $row['usuario'] . " -  " . $row['senha'] . "<BR/><br/>"; 

//comparar senhas e definir sessão para login
if(md5($pswd) == $row['senha']){
    session_start(); //INICIALIZA A SESSÃO 
   //GRAVA AS VARIÁVEIS NA SESSÃO 
    $_SESSION['user'] = $user; 
   // $_SESSION['pswd'] = $pswd;
   Header("Location: Menu.html");
}
else Header("Location: logar.php")

?>
