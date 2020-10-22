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

//Cadastra o evento na agenda
if (isset($_POST['cadastrarEvento'])) {

    $title = utf8_decode($_POST["title"]);
    $color = ($_POST["color"]);
    $data_start = str_replace('/', '-', $_POST['start']);
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));
    $data_end = str_replace('/', '-', $_POST['end']);
    $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));
    
    $sql = "INSERT INTO events 
    (title,color,start,end) 
    VALUES 
    ('$title','$color','$data_start_conv','$data_end_conv');";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['agendastatus']="sucesso";
        $_SESSION['agendamessage']="Cadastro realizado com sucesso!";
        header("Location: ../inicio.php");
    } else {
        //echo "Erro no cadastro";
        //echo mysqli_errno($conn) . ": " . mysqli_error($conn) . "\n";
        $_SESSION['agendastatus']="erro";
        $_SESSION['agendamessage']="Erro ao realizar o cadastro: " . mysqli_errno($conn) . " - " . mysqli_error($conn);
        header("Location: ../inicio.php");
    }
}

//Altera o evento na agenda
$comando = utf8_decode($_POST["comando"]);
echo $comando;
if ($comando == "alterarEvento") {

    $id = $_POST["id"];
    echo $id;
    echo " ";
    //$color = ($_POST["color"]);
    $data_start = str_replace('/', '-', $_POST['newStart']);
    echo $data_start;
    echo " ";
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));
    echo $data_start_conv;
    echo " ";
    $data_end = str_replace('/', '-', $_POST['newEnd']);
    $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));
    echo $data_end_conv;
    $sql = "UPDATE events SET start='$data_start_conv', end='$data_end_conv' WHERE id = '$id';";

    //if ($conn->query($sql) === TRUE) {
        //$_SESSION['agendastatus']="sucesso";
        //$_SESSION['agendamessage']="Cadastro realizado com sucesso!";
        //header("Location: ../inicio.php");
    //} else {
        //echo "Erro no cadastro";
        //echo mysqli_errno($conn) . ": " . mysqli_error($conn) . "\n";
        //$_SESSION['agendastatus']="erro";
        //$_SESSION['agendamessage']="Erro ao realizar o cadastro: " . mysqli_errno($conn) . " - " . mysqli_error($conn);
        //header("Location: ../inicio.php");
    //}
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