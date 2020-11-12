$(function () {
    $("#title").keyup(function () {
        //recupera o valor do campo
        var pesquisa = $(this).val();
        //verificar se há algo digitado
        if(pesquisa != ''){
            var dados = {
                palavra : pesquisa
            }
            $.post('../configs/buscanome.php', dados, function(retorna){
                // mostra dentro da ul o resultado obtido
                $(".resultado").html(retorna);
                
            });
        }
    });
});