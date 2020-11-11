<!-- Recupero o nome dos pacientes para o modal abaixo -->
<?
include_once ("../configs/conn.php");

// Recebe o valor enviado
$valor = $_GET['valor'];

    $sqlPacientes = "SELECT nome FROM pacientes WHERE nome LIKE '%".$valor."%';";
    $resultset = mysqli_query($conn, $sqlPacientes) or die("database error:". mysqli_error($conn));
        if (mysqli_num_rows($resultset) > 0) {
            while( $rows = mysqli_fetch_assoc($resultset) ) {	
                // recupera os nomes
                //echo $row["nome"];
                echo "<a href=\"javascript:func()\" onclick=\"exibirConteudo('".$row["nome"]."')\">" . $row["nome"]. "</a><br />";
            }
        }
    //$dados = substr($dados,0,-1); //retira a ultima virgula
?>