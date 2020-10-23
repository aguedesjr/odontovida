<?
//Requer estar autenticado no sistema
require_once ("validalogin.php");
$login = $_SESSION['login']; 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Odontovida</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
        <link href="Bootstrap/dist/css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
        <link href='lib/main.css' rel='stylesheet' />
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="Bootstrap/dist/js/scripts.js"></script>
        <script src='lib/main.js'></script>
    </head>
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
                    <div class="container-fluid">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-calendar mr-1"></i>
                                Agenda
                            </div>
                            <div class="card-body">
                            <?
                                if(isset($_SESSION['agendamessage'])){
                                        $status = $_SESSION['agendastatus'];
                                        if($status == "sucesso"){
                                            echo '<script type="text/javascript">',
                                                    'cadastrou();',
                                                 '</script>';
                                            /*echo '<div class="alert alert-success" role="alert"> '. $_SESSION['agendamessage'] . 
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>';*/
                                        } elseif ($status == "erro") {
                                            echo '<script type="text/javascript">',
                                                    'naocadastrou();',
                                                 '</script>';
                                            /*echo '<div class="alert alert-danger" role="alert"> '. $_SESSION['agendamessage'] . 
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>';*/
                                        }
                                        unset($_SESSION['agendamessage']);
                                        unset($_SESSION['agendastatus']);
                                }
                             ?>
                                <div id='script-warning'>
                                    <code>php/get-events.php</code> must be running.
                                </div>
                                <div id='loading'>loading...</div>
                                <div id='calendar'></div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Odontovida <?php echo date("Y"); ?>
</div>
                            <!--<div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>-->
                        </div>
                    </div>
                </footer>
            </div>
        </div>

        <!-- Modal de Cadastro de Usuários -->
        <div class="modal fade" id="cadastrar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Cadastrar Evento</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form method="POST" action="configs/managebd.php">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome do Paciente</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Nome do Paciente">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Color</label>
                                <div class="col-sm-10">
                                    <select name="color" class="form-control" id="color">
                                        <option value="">Selecione</option>			
                                        <option style="color: #FFD700;" value="#FFD700">Amarelo</option>
                                        <option style="color: #0071c5;" value="#0071c5">Azul Turquesa</option>
                                        <option style="color: #FF4500;" value="#FF4500">Laranja</option>
                                        <option style="color: #8B4513;" value="#8B4513">Marrom</option>	
                                        <option style="color: #1C1C1C;" value="#1C1C1C">Preto</option>
                                        <option style="color: #436EEE;" value="#436EEE">Royal Blue</option>
                                        <option style="color: #A020F0;" value="#A020F0">Roxo</option>
                                        <option style="color: #40E0D0;" value="#40E0D0">Turquesa</option>
                                        <option style="color: #228B22;" value="#228B22">Verde</option>
                                        <option style="color: #8B0000;" value="#8B0000">Vermelho</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Início da consulta</label>
                                <div class="col-sm-10">
                                    <input type="text" name="start" class="form-control" id="start" onkeypress="DataHora(event, this)">
                                    <input type="hidden" name="cadastrarEvento" value="cadastrarEvento">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Final da consulta</label>
                                <div class="col-sm-10">
                                    <input type="text" name="end" class="form-control" id="end"  onkeypress="DataHora(event, this)">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal de Cadastro de Usuários -->

    </body>
</html>
