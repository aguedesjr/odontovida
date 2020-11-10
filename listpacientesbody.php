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
                            <div class="card-body">
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
                                                <th><?echo '<a class="btn btn-danger" href="editpacientes.php?id="'.$row[2].'"><i class="fas fa-user-minus"></i> Apagar</a>';?></th>
                                                <th><?echo '<a class="btn btn-danger" href="configs/managebd.php?deletarPaciente&id="'.$row[2].'"><i class="fas fa-user-minus"></i> Apagar</a>';?></th>
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