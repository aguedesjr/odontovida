<?
# Arquivo de conexao com o banco de dados
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"

$hostname_conn = "localhost";
$database_conn = "odontovida";
$username_conn = "odontouser";
$password_conn = "0dOntoV1d4";
$conn = mysqli_connect($hostname_conn, $username_conn, $password_conn) or trigger_error(mysql_error(),E_USER_ERROR); 

mysqli_select_db($conn,$database_conn);
?>
