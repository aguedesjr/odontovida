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
                                            $sql = "SELECT codigo, nome FROM pacientes;";
                                            $result = $conn->query($sql);
                                        ?>
                                        <tbody>
                                            <? $row = $result->fetch_array(MYSQLI_NUM) { ?>
                                            <tr>
                                                <th><? echo $row[0]; ?></th>
                                                <th><? echo $row[1]; ?></th>
                                                <th>Editar</th>
                                                <th>APagar</th>
                                            </tr>
                                            <?};?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <script src="js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
                    <script src="js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
                    <script src="js/datatables.js"></script>