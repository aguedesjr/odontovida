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
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Odontovida</title>
        <link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"/>
        <link href="Bootstrap/dist/css/styles.css" rel="stylesheet" />
        <link href="css/jquery-ui.css" rel="stylesheet" />
        <script src="js/all.min.js" crossorigin="anonymous"></script>
        <link href='lib/main.css' rel='stylesheet' />
        <script src="js/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
        <!--<script src="js/buscanome.js" crossorigin="anonymous"></script>-->
        <script src="js/jquery-ui.js" crossorigin="anonymous"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/sweetalert2@10.js"></script>
        <script src="js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="Bootstrap/dist/js/scripts.js"></script>
        <script src='lib/main.js'></script>
        
        <script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var today = new Date();
    var mes = (today.getMonth()+1 < 10) ? '0'+(today.getMonth()+1) : (today.getMonth()+1);
    var dataatual = today.getFullYear()+'-'+mes+'-'+today.getDate();

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listWeek'
      },
      buttonText: {
        month:  'Mês',
        week: 'Semana',
        day: 'Dia',
        list: 'Lista',
        today: 'Hoje'
      },
      eventClick: function(info) {
          info.jsEvent.preventDefault();

          if (info.event.url) {
              window.open(info.event.url);
          } else {
              Swal.fire({
                  title: info.event.title, 
                  html: 
                    'Inicio: '+info.event.start.toLocaleString()+
                    '<br><br>'+
                    'Fim: '+info.event.end.toLocaleString(), 
                   icon: 'info'
              });
          }
      },
      //initialDate: dataatual,
      initialView: 'timeGridWeek',
      editable: true,
      navLinks: true, // can click day/week names to navigate views
      dayMaxEvents: true, // allow "more" link when too many events
      locale: 'pt-br',
      events: {
        url: 'configs/get-events.php?timeZone=America/Sao_Paulo',
        failure: function() {
          document.getElementById('script-warning').style.display = 'block'
        }
      },
      loading: function(bool) {
        document.getElementById('loading').style.display =
          bool ? 'block' : 'none';
      },
      selectable: true,
      select: function(info){
        $('#cadastrar #start').val(info.start.toLocaleString());
        $('#cadastrar #end').val(info.end.toLocaleString());
        $('#cadastrar').modal('show');
      },
      eventResize: function(info, delta, revertFunc) {
        Swal.fire({
            title: 'Deseja alterar a marcação?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "configs/managebd.php",
                    data: {
                        id: info.event.id,
                        newStart: info.event.start.toLocaleString(),
                        newEnd: info.event.end.toLocaleString(),
                        comando: "alterarEvento"
                    },
                    dataType: "html",
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Alteração realizada!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Alteração descartada!',
                    showConfirmButton: false,
                    timer: 1500
                    });
                info.revert();
            }
        })
      },
      eventDrop: function(info, delta, revertFunc) {
        Swal.fire({
            title: 'Deseja alterar a marcação?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'OK'
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "configs/managebd.php",
                    data: {
                        id: info.event.id,
                        newStart: info.event.start.toLocaleString(),
                        newEnd: info.event.end.toLocaleString(),
                        comando: "alterarEvento"
                    },
                    dataType: "html",
                    success: function(data) {
                        console.log(data);
                        Swal.fire({
                            position: 'top-end',
                            icon: 'success',
                            title: 'Alteração realizada!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                    }
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                Swal.fire({
                    position: 'top-end',
                    icon: 'error',
                    title: 'Alteração descartada!',
                    showConfirmButton: false,
                    timer: 1500
                    });
                info.revert();
            }
        })
      }
    });

    calendar.render();
  });

  function cadastrou() {
    Swal.fire({
            title: 'Cadastro realizado com sucesso!', 
            position: 'top-end',
            icon: 'success',
            showConfirmButton: false,
            timer: 1500
        });
  }

  function naocadastrou() {
    Swal.fire({
            title: 'Erro ao realizar o cadastro', 
            position: 'top-end',
            icon: 'error',
            showConfirmButton: false,
            timer: 1500
        });
  }

  function DataHora(evento, objeto) {
    var keypress = (window.event) ? event.keyCode : evento.which;
    campo = eval(objeto);
    if (campo.value == '00/00/0000 00:00:00') {
        campo.value = "";
    }

    caracteres = '0123456789';
    separacao1 = '/';
    separacao2 = ' ';
    separacao3 = ':';
    conjunto1 = 2;
    conjunto2 = 5;
    conjunto3 = 10;
    conjunto4 = 13;
    conjunto5 = 16;
    if ((caracteres.search(String.fromCharCode(keypress)) != -1) && campo.value.length < (19)) {
        if (campo.value.length == conjunto1)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto2)
            campo.value = campo.value + separacao1;
        else if (campo.value.length == conjunto3)
            campo.value = campo.value + separacao2;
        else if (campo.value.length == conjunto4)
            campo.value = campo.value + separacao3;
        else if (campo.value.length == conjunto5)
            campo.value = campo.value + separacao3;
    } else {
        event.returnValue = false;
    }
}
</script>

<style>

  body {
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #script-warning {
    display: none;
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    text-align: center;
    font-weight: bold;
    font-size: 12px;
    color: red;
  }

  #loading {
    display: none;
    position: absolute;
    top: 10px;
    right: 10px;
  }

  #calendar {
    /*max-width: 1900px;*/
    margin: 40px auto;
    padding: 0 10px;
  }

</style>
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
                                if(isset($_SESSION['messagestatus'])){
                                        $status = $_SESSION['messagestatus'];
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
                                        unset($_SESSION['messagestatus']);
                                        //unset($_SESSION['agendastatus']);
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
                <? include ("footer.php"); ?>
            </div>
        </div>
        
        <script>
            /*$( function() {
                var availableTags = [<? //echo $dados;?>];
                $("#title").autocomplete({
                    source: availableTags
                });
            } );*/
        </script>
        <!-- Recupero o nome dos pacientes para o modal abaixo -->
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
                    <script type="text/javascript">
                        $(document).ready(function() {
                            
                            // Captura o retorno do retornaCliente.php
                            $.getJSON('configs/buscanome.php', function(data){
                                var paciente = [];
                                
                                // Armazena na array capturando somente o nome do cliente
                                $(data).each(function(key, value) {
                                    paciente.push(value.nome);
                                });
                                
                                // Chamo o Auto complete do JQuery ui setando o id do input, array com os dados e o mínimo de caracteres para disparar o AutoComplete
                                $('#cadastrar #title').autocomplete({ source: paciente, minLength: 3});
                            });
                        });
                    </script>
                        <form method="POST" action="configs/managebd.php">
                            <div class="form-group row">
                                <label class="col-sm-2 col-form-label">Nome do Paciente</label>
                                <div class="col-sm-10">
                                    <input type="text" name="title" class="form-control" id="title" placeholder="Nome do Paciente" style="text-transform:uppercase">
                                    <div class="resultado"></div>
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