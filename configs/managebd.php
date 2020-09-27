<?
//Requer estar autenticado no sistema
require_once ("../validalogin.php");

//Requer conexao previa com o banco
require_once ("conn.php");

//Retorna erro em caso de problema de conexão com o BD
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
}

//Cria o evento na agenda
if (isset($_POST ['title'])) {
    $title = ($_POST["title"]);
    $start = $_POST["start"];
    $end = $_POST["end"];

    $sql = "INSERT INTO events 
    (title,start_date,end_date) 
    VALUES 
    ('$title','$start','$end');";
}

//Cadastra o paciente
if (isset($_POST ['cadastrarPaciente'])) {

    $nome = utf8_decode($_POST["nome"]);
    $cpf = ($_POST["cpf"]);
    $data = $_POST["data"];
    $data = implode("-", array_reverse(explode("/", $data)));
    $cep = $_POST["cep"];
    $cidade = utf8_decode($_POST["cidade"]);
    $uf = utf8_decode($_POST["uf"]);
    $endereco = utf8_decode($_POST["logradouro"]);
    $numero = $_POST['numero'];
    $complemento = utf8_decode($_POST["complemento"]);
    $bairro = utf8_decode($_POST["bairro"]);
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];


    $sql = "INSERT INTO pacientes 
    (nome,data,cpf,endereco,cep,bairro,telefone,celular,cidade,estado,numero,complemento) 
    VALUES 
    ('$nome','$data','$cpf','$endereco','$cep','$bairro','$tel','$cel','$cidade','$uf','$numero','$complemento');";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['message']="Cadastro realizado com sucesso!";
        header("Location: ../inicio.php#cadastrarpaciente");
    } else {
        $_SESSION['message']="Falha ao realizar o cadastro!";
        header("Location: ../inicio.php#cadastrarpaciente");
    }
}
//Encerra a conexão
$conn->close();

?>