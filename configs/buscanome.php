<?
include_once ("../configs/conn.php");

// Recebe o valor enviado
/*$valor = $_GET['valor'];

    $sqlPacientes = "SELECT nome FROM pacientes WHERE nome LIKE '%".$valor."%';";
    $resultset = mysqli_query($conn, $sqlPacientes) or die("database error:". mysqli_error($conn));
        if (mysqli_num_rows($resultset) > 0) {
            while( $rows = mysqli_fetch_assoc($resultset) ) {	
                // recupera os nomes
                echo $rows["nome"];
                //echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$rows["nome"]."')\">" . $rows["nome"]. "</a><br />";
            }
        }*/
    //$dados = substr($dados,0,-1); //retira a ultima virgula

    $nome = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);
    $sqlPacientes = "SELECT nome FROM pacientes WHERE nome LIKE '%$nome%' LIMIT 20;";
    $resultset = mysqli_query($conn, $sqlPacientes) or die("database error:". mysqli_error($conn));
        if (($resultset) AND ($resultset->num_rows != 0)) {
            while( $rows = mysqli_fetch_assoc($resultset) ) {	
                // recupera os nomes
                echo $rows["nome"];
                //echo "< li>".$rows["nome"]."</>";
                //echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$rows["nome"]."')\">" . $rows["nome"]. "</a><br />";
            }
        } else {
            echo "Nenhum paciente encontrado...."
        }
?>