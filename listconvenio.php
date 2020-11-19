<?
//Requer conexao previa com o banco
require_once ("configs/conn.php");

//Retorna erro em caso de problema de conexão com o BD
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}
//Requer estar autenticado no sistema
require_once ("validalogin.php");
$login = $_SESSION['login']; 
?>
<!DOCTYPE html>
<html lang="en">
<? include ("head.php"); ?>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="inicio.php">Odontovida</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar Search-->
            <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
                <div class="input-group">
                    <!--<input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" />-->
                    <div class="input-group-append">
                        <!--<button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>-->
                    </div>
                </div>
            </form>
            <!-- Navbar-->
            <? include ("menu_topo_user.php"); ?>
        </nav>
        <div id="layoutSidenav">
            <? include ("menu_lateral.php"); ?>
            <div id="layoutSidenav_content">
                <main>
                    <? include ("listconveniobody.php"); ?>
                </main>
                    <? include ("footer.php"); ?>
            </div>
        </div>
    </body>
</html>
