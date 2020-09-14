<div class="row border-bottom bd-lightGray m-3">
    <div class="cell-md-4 d-flex flex-align-center">
        <!--<h3 class="dashboard-section-title text-center text-left-md w-100"><small></small></h3>-->
    </div>

    <div class="cell-md-8 d-flex flex-justify-center flex-justify-end-md flex-align-center">
        <ul class="breadcrumbs bg-transparent">
            <li class="page-item"><a href="inicio.php" class="page-link"><span class="mif-meter"></span></a></li>
            <li class="page-item"><a href="" class="page-link">Pacientes</a></li>
            <li class="page-item"><a href="" class="page-link">Cadastrar</a></li>
        </ul>
    </div>
</div>

<div class="m-3">
     <div class="row">
         <div class="cell-lg-6">
            <div class="bg-white p-4 m-2">
                 <h4>Cadastrar Pacientes</h4>
                 <form name="form1" class="custom-validation need-validation" novalidate="">
                     <div class="row mb-3">
                         <div class="cell-md-6">
                             <label>Nome</label>
                             <input type="text" required="" title="" style="text-transform: uppercase;">
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
                             <input type="text" required="" title="" id="cidade" style="text-transform: uppercase;">
                         </div>
                         <div class="cell-md-3">
                             <label>Estado</label>
                             <input type="text" required="" title="" id="uf" style="text-transform: uppercase;">
                         </div>
                     </div>
                     <div class="row mb-2">
                         <div class="cell-md-6">
                             <label>Endereço</label>
                             <input type="text" required="" title="" id="logradouro" style="text-transform: uppercase;">
                         </div>
                         <div class="cell-md-3">
                             <label>Número</label>
                             <input type="text" required="" title="" id="numero">
                         </div>
                         <div class="cell-md-3">
                             <label>Complemento</label>
                             <input type="text" required="" title="" style="text-transform: uppercase;">
                         </div>
                     </div>
                     <div class="row mb-2">
                         <div class="cell-md-6">
                             <label>Bairro</label>
                             <input type="text" required="" title="" id="bairro" style="text-transform: uppercase;">
                         </div>
                         <div class="cell-md-3">
                             <label>Telefone</label>
                             <input type="text" required="" title="" name="tel" onKeyPress="MascaraTelefone(form1.tel);" maxlength="14">
                         </div>
                         <div class="cell-md-3">
                             <label>Celular</label>
                             <input type="text" required="" title="" name="cel" onKeyPress="MascaraCelular(form1.cel);" maxlength="15">
                         </div>
                     </div>
                     <button class="button primary">Cadastrar</button>
                     <script src="Pandora/source/vendors/jquery/jquery-3.4.1.min.js"></script>
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
                                        $("#cep").focus();
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