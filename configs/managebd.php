<?
//Requer estar autenticado no sistema
require_once ("../validalogin.php");

//Requer conexao previa com o banco
require_once ("conn.php");

//Retorna erro em caso de problema de conexão com o BD
if ($conn->connect_error) {
    die("Connection failed:" . $conn->connect_error);
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
        $_SESSION['messagestatus']="sucesso";
        //$_SESSION['agendamessage']="Cadastro realizado com sucesso!";
        header("Location: ../inicio.php");
    } else {
        //echo "Erro no cadastro";
        //echo mysqli_errno($conn) . ": " . mysqli_error($conn) . "\n";
        $_SESSION['messagestatus']="erro";
        //$_SESSION['agendamessage']="Erro ao realizar o cadastro: " . mysqli_errno($conn) . " - " . mysqli_error($conn);
        header("Location: ../inicio.php");
    }
}

//Altera o evento na agenda
$comando = utf8_decode($_POST["comando"]);
if ($comando == "alterarEvento") {
    $id = $_POST["id"];
    //$color = ($_POST["color"]);
    $data_start = str_replace('/', '-', $_POST['newStart']);
    $data_start_conv = date("Y-m-d H:i:s", strtotime($data_start));
    $data_end = str_replace('/', '-', $_POST['newEnd']);
    $data_end_conv = date("Y-m-d H:i:s", strtotime($data_end));
    $sql = "UPDATE events SET start='$data_start_conv', end='$data_end_conv' WHERE id = '$id';";
    //$conn->query($sql);
    if ($conn->query($sql) === TRUE) {
        echo "Alteração realizada!";
        //$_SESSION['agendastatus']="sucesso";
        //$_SESSION['agendamessage']="Cadastro realizado com sucesso!";
        //header("Location: ../inicio.php");
    } else {
        echo "Alteração com erro!";
        //echo "Erro no cadastro";
        //echo mysqli_errno($conn) . ": " . mysqli_error($conn) . "\n";
        //$_SESSION['agendastatus']="erro";
        //$_SESSION['agendamessage']="Erro ao realizar o cadastro: " . mysqli_errno($conn) . " - " . mysqli_error($conn);
        //header("Location: ../inicio.php");
    }
}


//Cadastra o paciente
if (isset($_POST ['cadastrarPaciente'])) {

    $codigo = ($_POST["codigo"]);
    $nome = strtoupper(utf8_decode($_POST["nome"]));
    $cpf = ($_POST["cpf"]);
    $data = $_POST["data"];
    $data = implode("-", array_reverse(explode("/", $data)));
    $email = strtoupper(utf8_decode($_POST["email"]));
    $cep = $_POST["cep"];
    $cidade = strtoupper(utf8_decode($_POST["cidade"]));
    $uf = strtoupper(utf8_decode($_POST["uf"]));
    $endereco = strtoupper(utf8_decode($_POST["logradouro"]));
    $numero = $_POST['numero'];
    $complemento = strtoupper(utf8_decode($_POST["complemento"]));
    $bairro = strtoupper(utf8_decode($_POST["bairro"]));
    $tel = $_POST['tel'];
    $cel = $_POST['cel'];


    $sql = "INSERT INTO pacientes 
    (codigo,nome,data,cpf,endereco,cep,bairro,telefone,celular,cidade,estado,numero,complemento,email) 
    VALUES 
    ('$codigo,'$nome','$data','$cpf','$endereco','$cep','$bairro','$tel','$cel','$cidade','$uf','$numero','$complemento','$email');";

    if ($conn->query($sql) === TRUE) {
        $_SESSION['messagestatus']="sucesso";
        header("Location: ../cadpacientes.php");
    } else {
        $_SESSION['messagestatus']="erro";
        echo "Erro ao realizar o cadastro: " . mysqli_errno($conn) . " - " . mysqli_error($conn);
        //header("Location: ../cadpacientes.php");
    }
}
//Encerra a conexão
$conn->close();

?>