<div class="container-fluid">
    <h1 class="mt-4">Pacientes</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"></li>
    </ol>
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-plus mr-1"></i>
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
                    <?
                        $aux1 = date("Y");
                        $aux2 = rand(10,99);
                        $sql = "SELECT MAX(id) FROM pacientes;";
                        $result = $conn->query($sql);
                        $row = $result->fetch_array(MYSQLI_NUM);
                        $cod = $aux1.$aux2.($row[0]+1).$aux2;
                        /* free result set */
                        $result->close();
                        /* close connection */
                        $conn->close();
                    ?>
                    <div class="form-group col-md-2">
                    <input type="hidden" name="cadastrarPaciente" value="cadastrarPaciente">
                    <label for="codigo">Nº Paciente</label>
                    <input type="text" class="form-control" id="codigo" name="codigo" value="<?echo $cod;?>" readonly>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome" style="text-transform: uppercase;" required>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" name="cpf" onBlur="ValidarCPF(form1.cpf);" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" required>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="data">Data de Nascimento</label>
                    <input type="text" class="form-control" id="data" name="data" onKeyPress="MascaraData(form1.data);" maxlength="10">
                    </div>
                    <div class="form-group col-md-2">
                    <label for="email">E-Mail</label>
                    <input type="email" class="form-control" id="email" name="email" style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-1">
                    <label for="cep">CEP</label>
                    <input type="text" class="form-control" id="cep" name="cep" onKeyPress="MascaraCep(form1.cep);" maxlength="8">
                    </div>
                    <div class="form-group col-md-5">
                    <label for="logradouro">Endereço</label>
                    <input type="text" class="form-control" id="logradouro" name="logradouro" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-3">
                    <label for="bairro">Bairro</label>
                    <input type="text" class="form-control" id="bairro" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-1">
                    <label for="numero">Número</label>
                    <input type="text" class="form-control" id="numero" name="numero">
                    </div>
                    <div class="form-group col-md-2">
                    <label for="complemento">Complemento</label>
                    <input type="text" class="form-control" id="complemento" name="complemento" style="text-transform: uppercase;">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-3">
                    <label for="cidade">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-1">
                    <label for="uf">Estado</label>
                    <input type="text" class="form-control" id="uf" name="uf" style="text-transform: uppercase;">
                    </div>
                    <div class="form-group col-md-2">
                    <label for="tel">Telefone</label>
                    <input type="text" class="form-control" id="tel" onKeyPress="MascaraTelefone(form1.tel);" maxlength="14">
                    </div>
                    <div class="form-group col-md-2">
                    <label for="cel">Celular</label>
                    <input type="text" class="form-control" id="cel" onKeyPress="MascaraCelular(form1.cel);" maxlength="15">
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>

                <!-- SCRIPTS DE MASCARA -->
                <script>
                         function mascaraInteiro(){
                            if (event.keyCode < 48 || event.keyCode > 57){
                                event.returnValue = false;
                                return false;
                            }
                            return true;
                        }
                        function formataCampo(campo, Mascara, evento) {
                            var boleanoMascara;
                            var Digitato = evento.keyCode;
                            exp = /\-|\.|\/|\(|\)| /g
                            campoSoNumeros = campo.value.toString().replace( exp, "" );
                            var posicaoCampo = 0;
                            var NovoValorCampo="";
                            var TamanhoMascara = campoSoNumeros.length;;

                            if (Digitato != 8) {
                                for(i=0; i<= TamanhoMascara; i++) {
                                    boleanoMascara  = ((Mascara.charAt(i) == "-") || (Mascara.charAt(i) == ".")
                                                                || (Mascara.charAt(i) == "/"))
                                    boleanoMascara  = boleanoMascara || ((Mascara.charAt(i) == "(")
                                                                || (Mascara.charAt(i) == ")") || (Mascara.charAt(i) == " ")) 
                                    if (boleanoMascara) {
                                        NovoValorCampo += Mascara.charAt(i);
                                        TamanhoMascara++;
                                    }
                                    else {
                                        NovoValorCampo += campoSoNumeros.charAt(posicaoCampo);
                                        posicaoCampo++;
                                    }
                                }
                                campo.value = NovoValorCampo;
                                return true;
                            }else {
                                return true;
                            }
                        }
                         function MascaraCPF(cpf){
                            if(mascaraInteiro(cpf)==false){
                                event.returnValue = false;
                            }
                            return formataCampo(cpf, '000.000.000-00', event);
                        }
                        function ValidarCPF(Objcpf){
                            var cpf = Objcpf.value;
                            exp = /\.|\-/g
                            cpf = cpf.toString().replace( exp, "" );
                            var digitoDigitado = eval(cpf.charAt(9)+cpf.charAt(10));
                            var soma1=0, soma2=0;
                            var vlr =11;

                            for(i=0;i<9;i++){
                                soma1+=eval(cpf.charAt(i)*(vlr-1));
                                soma2+=eval(cpf.charAt(i)*vlr);
                                vlr--;
                            }
                            soma1 = (((soma1*10)%11)==10 ? 0:((soma1*10)%11));
                            soma2=(((soma2+(2*soma1))*10)%11);

                            var digitoGerado=(soma1*10)+soma2;
                            if(digitoGerado!=digitoDigitado) 
                            Swal.fire({
                                title: 'CPF inválido', 
                                position: 'top-end',
                                icon: 'error',
                                showConfirmButton: false,
                                timer: 1500
                            });
                        }
                        function MascaraCep(cep){
                            if(mascaraInteiro(cep)==false){
                                event.returnValue = false;
                            }
                            return formataCampo(cep, '00000000', event);
                        }
                        $("#cep").focusout(function(){
		                    $.ajax({
			                    url: 'https://viacep.com.br/ws/'+$(this).val()+'/json/unicode/',
			                    dataType: 'json',
			                    success: function(resposta){
                                    if (!("erro" in resposta)) {
				                        $("#logradouro").val(resposta.logradouro);
				                        $("#complemento").val(resposta.complemento);
				                        $("#bairro").val(resposta.bairro);
				                        $("#cidade").val(resposta.localidade);
				                        $("#uf").val(resposta.uf);
                                        $("#numero").focus();
                                    }
                                    else {
                                        Swal.fire({
                                            title: 'CEP não encontrado!', 
                                            position: 'top-end',
                                            icon: 'error',
                                            showConfirmButton: false,
                                            timer: 1500
                                        });
                                        $("#logradouro").val();
				                        $("#complemento").val();
				                        $("#bairro").val();
				                        $("#cidade").val();
				                        $("#uf").val();
                                        //$("#cep").focus();
                                    }
                                },
                                error: function (jqXHR, textStatus, errorThrown) { errorFunction(); }
		                    });
                        });
                        function MascaraData(data){
                                if(mascaraInteiro(data)==false){
                                        event.returnValue = false;
                                }
                                return formataCampo(data, '00/00/0000', event);
                        }
                        function MascaraTelefone(tel){
                                if(mascaraInteiro(tel)==false){
                                        event.returnValue = false;
                                }
                                return formataCampo(tel, '(00) 0000-0000', event);
                        }
                        function MascaraCelular(cel){
                                if(mascaraInteiro(cel)==false){
                                        event.returnValue = false;
                                }
                                return formataCampo(cel, '(00) 00000-0000', event);
                        }
                    </script>
                <!-- SCRIPTS DE MASCARA -->
            </form>
        </div>
    </div>
</div>