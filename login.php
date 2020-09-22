<?
# Arquivo de verificacao de login e senha

//Requer conexao previa com o banco
require_once ("configs/conn.php");

// Obtem os dados do formulario de login
session_start();
$login = $_POST["user"]; //Recebe o login
$senha = $_POST["pass"]; //Recebe a senha

// trata os dados recebidos;
$login = str_replace(" ", "",$login);
$login = str_replace("/","",$login);
$login = str_replace(";","",$login);
$senha = str_replace(" ", "",$senha);
$senha = str_replace("/","",$senha);
$senha = str_replace(";","",$senha);

// Busca no banco de dados o usuario informado
//$resultado = mysql_query("SELECT login, senha, perfil, nome FROM users WHERE login = '$login' AND senha = ENCRYPT('" .$senha. "', senha);");
$resultado = mysqli_query($conn,"SELECT login, senha, perfil FROM users WHERE login = '$login' AND senha = ENCRYPT('" .$senha. "', senha);");
$linhas = mysqli_num_rows($resultado);

if (!function_exists('mysql_result')) {
  function mysql_result($result, $number, $field=0) {
      mysqli_data_seek($result, $number);
      $row = mysqli_fetch_array($result);
      return $row[$field];
  }
}

if ($linhas > 0){ //Verifica se encontrou algum usuário

  $_SESSION['autenticado']="sim";
  $_SESSION['login']=mysql_result($resultado,0,"login");
  $_SESSION['perfil']= mysql_result($resultado,0,"perfil");
  header ("location:inicio.php");
}
else {
  header ("location:fail.php");
}
?>