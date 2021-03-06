<div class="container-fluid">
    <h1 class="mt-4">Procedimentos</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-folder-plus mr-1"></i>
            Cadastrar
        </div>
        <script>
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

           function formatarMoeda() {
                var elemento = document.getElementById('valor');
                var valor = elemento.value;

                valor = valor + '';
                valor = parseInt(valor.replace(/[\D]+/g, ''));
                valor = valor + '';
                valor = valor.replace(/([0-9]{2})$/g, ",$1");

                if (valor.length > 6) {
                    valor = valor.replace(/([0-9]{3}),([0-9]{2}$)/g, ".$1,$2");
                }

                elemento.value = valor;
                if(valor == 'NaN') elemento.value = '';
           }
</script>
        </script>
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
            }
         ?>
            <form name="form1" action="configs/managebd.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <input type="hidden" name="cadastrarProcedimento" value="cadastrarProcedimento">
                        <label for="nome">Código *</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" style="text-transform: uppercase;" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nome">Nome *</label>
                        <input type="text" class="form-control" id="nome" name="nome" style="text-transform: uppercase;" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="grupo">Grupo *</label>
                        <select class="custom-select" id="grupo" name="grupo">
                            <option selected>Selecionar...</option>
                            <option value="CIRURGIA">CIRURGIA</option>
                            <option value="DENTÍSTICA">DENTÍSTICA</option>
                            <option value="DIAGNÓSTICOS">DIAGNÓSTICOS</option>
                            <option value="ENDODONTIA">ENDODONTIA</option>
                            <option value="IMPLANTOLOGIA">IMPLANTOLOGIA</option>
                            <option value="ORTODONTIA">ORTODONTIA</option>
                            <option value="PERIODONTIA">PERIODONTIA</option>
                            <option value="PROFILAXIA">PROFILAXIA</option>
                            <option value="PRÓTESE">PRÓTESE</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="nome">Valor *</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control" id="valor" name="valor" onkeyup="formatarMoeda()" required>
                        </div>
                    </div>
                    <?
                        $sql = "SELECT id, nome FROM convenios ORDER BY nome;";
                        $result = $conn->query($sql);
                    ?>
                    <div class="form-group col-md-4">
                        <label for="convenio">Convênio *</label>
                        <select class="custom-select" id="convenio" name="convenio">
                            <option selected>Selecionar...</option>
                            <?  while($row = $result->fetch_array(MYSQLI_NUM)) { 
                                    echo '<option value="'.$row[0].'">'.$row[1].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </div>
                    <div class="form-group col-md-1">
                        <div class="container-fluid">
                            <div class="d-flex align-items-center justify-content-between small">
                                <div class="text-muted">* Campos obrigatórios</div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>

        </div>
    </div>
</div>