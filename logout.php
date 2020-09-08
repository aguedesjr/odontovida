<?
    session_start();
    //Codigo de logout
    $_SESSION = array();
    session_destroy(); //Encerra a sessao
    unset($_SESSION[login]); //Limpa o login
    unset($_SESSION[perfil]); //Limpa o perfil
    header ("location:index.php");
?>