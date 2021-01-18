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
                        <input type="hidden" name="cadastrarConvenio" value="cadastrarProcedimento">
                        <label for="nome">Código *</label>
                        <input type="text" class="form-control" id="codigo" name="codigo" style="text-transform: uppercase;" required>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="nome">Nome *</label>
                        <input type="text" class="form-control" id="nome" name="nome" style="text-transform: uppercase;" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                    <label for="nome">Valor *</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text">R$</span>
                            </div>
                            <input type="text" class="form-control" id="valor" name="valor" style="text-transform: uppercase;" required>
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="SelectConvenio"></label>
                        <select class="custom-select" id="SelectConvenio">
                            <option selected>Choose...</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
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