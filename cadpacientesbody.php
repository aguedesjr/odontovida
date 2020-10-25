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
            <form name="form1" action="configs/managebd.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" style="text-transform: uppercase;" required>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="cpf">CPF</label>
                    <input type="text" class="form-control" id="cpf" onBlur="ValidarCPF(form1.cpf);" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14" required>
                    </div>
                    <div class="form-group col-md-3">
                    <label for="data">Data de Nascimento</label>
                    <input type="text" class="form-control" id="data" nKeyPress="MascaraData(form1.data);" maxlength="10" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputAddress">Address</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
                </div>
                <div class="form-group">
                    <label for="inputAddress2">Address 2</label>
                    <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                    <label for="inputCity">City</label>
                    <input type="text" class="form-control" id="inputCity">
                    </div>
                    <div class="form-group col-md-4">
                    <label for="inputState">State</label>
                    <select id="inputState" class="form-control">
                        <option selected>Choose...</option>
                        <option>...</option>
                    </select>
                    </div>
                    <div class="form-group col-md-2">
                    <label for="inputZip">Zip</label>
                    <input type="text" class="form-control" id="inputZip">
                    </div>
                </div>
                <div class="form-group">
                    <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="gridCheck">
                    <label class="form-check-label" for="gridCheck">
                        Check me out
                    </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Sign in</button>
            </form>
        </div>
    </div>
</div>

<div class="m-3">
     <div class="row">
         <div class="cell-lg-6">
            <div class="bg-white p-4 m-2">
                 <h4>Cadastrar Pacientes</h4>
                 <form name="form1" class="custom-validation need-validation" novalidate="" action="configs/managebd.php" method="POST">
                     <div class="row mb-3">
                         <div class="cell-md-6">
                             <label>Nome</label>
                             <input type="text" required="" title="" name="nome" style="text-transform: uppercase;">
                         </div>
                         <div class="cell-md-3">
                             <label>CPF</label>
                             <input type="text" required="" title="" name="cpf" onBlur="ValidarCPF(form1.cpf);" onKeyPress="MascaraCPF(form1.cpf);" maxlength="14">
                         </div>
                         <div class="cell-md-3">
                             <label>Data de Nascimento</label>
                             <input type="text" required="" title="" name="data" onKeyPress="MascaraData(form1.data);" maxlength="10">
                         </div>
                     </div>
                     <div class="row mb-2">
                        <div class="cell-md-3">
                             <label>CEP</label>
                             <input type="text" required="" title="" id="cep" name="cep" onKeyPress="MascaraCep(form1.cep);" maxlength="8">
                         </div>
                         <div class="cell-md-6">
                             <label>Cidade</label>
                             <input type="text" required="" title="" id="cidade" name="cidade" style="text-transform: uppercase;">
                         </div>
                         <div class="cell-md-3">
                             <label>Estado</label>
                             <input type="text" required="" title="" id="uf" name="uf" style="text-transform: uppercase;">
                         </div>
                     </div>
                     <div class="row mb-2">
                         <div class="cell-md-6">
                             <label>Endereço</label>
                             <input type="text" required="" title="" id="logradouro" name="logradouro" style="text-transform: uppercase;">
                         </div>
                         <div class="cell-md-3">
                             <label>Número</label>
                             <input type="text" required="" title="" id="numero" name="numero">
                         </div>
                         <div class="cell-md-3">
                             <label>Complemento</label>
                             <input type="text" required="" title="" name="complemento" style="text-transform: uppercase;">
                         </div>
                     </div>
                     <div class="row mb-2">
                         <div class="cell-md-6">
                             <label>Bairro</label>
                             <input type="text" required="" title="" id="bairro" name="bairro" style="text-transform: uppercase;">
                             <?
                                if(isset($_SESSION['message'])){
                                        echo '<div class="invalid_feedback"> '. $_SESSION['message'] . '</div>';
                                        unset($_SESSION['message']);
                                }
                             ?>
                         </div>
                         <div class="cell-md-3">
                             <label>Telefone</label>
                             <input type="text" required="" title="" name="tel" onKeyPress="MascaraTelefone(form1.tel);" maxlength="14">
                         </div>
                         <div class="cell-md-3">
                             <label>Celular</label>
                             <input type="text" required="" title="" name="cel" onKeyPress="MascaraCelular(form1.cel);" maxlength="15">
                             <input type="hidden" name="cadastrarPaciente" value="cadastrarPaciente">
                         </div>
                     </div>
                     <button onClick="Metro.activity.open({
                        type: 'metro',
                        text: '<div class=\'mt-2 text-small\'>Aguarde...</div>',
                        autoHide: 3000
                     })" class="button primary">Cadastrar</button>
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
                                alert('CPF Invalido!');
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
                                        alert("CEP não encontrado!!");
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
                 </form>
            </div>
     </div>
</div>