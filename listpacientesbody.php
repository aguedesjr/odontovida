                    <div class="container-fluid">
                        <h1 class="mt-4">Pacientes</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active"></li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                Listar
                            </div>
                            <script>
                                function realizou() {
                                Swal.fire({
                                        title: 'Paciente apagado com sucesso!', 
                                        position: 'top-end',
                                        icon: 'success',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                            }

                            function naorealizou() {
                                Swal.fire({
                                        title: 'Erro ao apagar paciente', 
                                        position: 'top-end',
                                        icon: 'error',
                                        showConfirmButton: false,
                                        timer: 1500
                                    });
                            }
                            </script>
                            <div class="card-body">
                            <?
                                if(isset($_SESSION['messagestatus'])){
                                        $status = $_SESSION['messagestatus'];
                                        if($status == "sucesso"){
                                            echo '<script type="text/javascript">',
                                                    'realizou();',
                                                '</script>';
                                            /*echo '<div class="alert alert-success" role="alert"> '. $_SESSION['agendamessage'] . 
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>';*/
                                        } elseif ($status == "erro") {
                                            echo '<script type="text/javascript">',
                                                    'naorealizou();',
                                                '</script>';
                                            /*echo '<div class="alert alert-danger" role="alert"> '. $_SESSION['agendamessage'] . 
                                            '<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button></div>';*/
                                        }
                                        unset($_SESSION['messagestatus']);
                                }
                            ?>
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Codigo</th>
                                                <th>Nome</th>
                                                <th>Editar</th>
                                                <th>Apagar</th>
                                            </tr>
                                        </thead>
                                        <?
                                            $sql = "SELECT codigo, nome, id FROM pacientes ORDER BY nome;";
                                            $result = $conn->query($sql);
                                        ?>
                                        <tbody>
                                            <? while($row = $result->fetch_array(MYSQLI_NUM)) { ?>
                                            <tr>
                                                <th><? echo $row[0]; ?></th>
                                                <th><? echo $row[1]; ?></th>
                                                <th><?echo '<a class="btn btn-warning" href="editpacientes.php?id='.$row[2].'"><i class="fas fa-user-edit"></i> Editar</a>';?></th>
                                                <th><?echo '<a class="btn btn-danger" href="configs/managebd.php?comando=deletarPaciente&id='.$row[2].'"><i class="fas fa-user-minus"></i> Apagar</a>';?></th>
                                            </tr>
                                            <?};
                                             /* free result set */
                                            $result->close();
                                            /* close connection */
                                            $conn->close();?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="js/jquery.dataTables.min.js"></script>
                    <script src="js/dataTables.bootstrap4.min.js"></script>
                    <script src="js/datatables.js"></script>