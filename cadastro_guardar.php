<?php

session_start();

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$csenha = $_POST['csenha'];


$conn = mysqli_connect("localhost", "root", "", "clientespi");
mysqli_set_charset($conn, "utf8");

$sqlemail = "select cli_email from `clientes` where cli_email=\"$email\"";

$result = mysqli_query($conn, $sqlemail);

// Verifica se email ja registrado
if (mysqli_num_rows($result) > 0){
    $_SESSION['msg_cad'] = "E-Mail já cadastrado!";
    header("location: cadastro.php");
} else {

$nerro = "";
$emerro = "";
$serro = "";
$cserro = "";

// Nome
if (strlen($nome) >= 3 && strlen($nome) <= 50) {
    $nerro = "";
} else {
    $nerro = "nome"   ;
}

// Email
if (preg_match('/^[^@\s]+@([^@\s]+\.)+[^@\s]+$/', $email)) {
    $emerro = "";
} else {
    $emerro = "email";
}

if (strlen($email) >= 5 && strlen($email) <= 50){
    $emerro = "";
} else {
    $emerro = "1";
}

// Senha
$sequencias = ["12", "23", "34", "45", "56", "67", "78", "89", "98", "87", "76", "65", "54", "43", "32", "21"];

// Tamanho
if (strlen($senha) >= 8 && strlen($senha) <= 64) {
    $serro = "";
} else {
    $serro = "1";
}

// Espaço
if (strpos($senha, ' ') !== false) {
    $serro = "";
} else {
    $serro = "espaço";
}

// Maiscula e Minuscula
if (ctype_upper($senha) && ctype_lower($senha)) {
    $serro = "";
} else {
    $serro = "MAI";
}

// Caractere Especial
if (preg_match('/[^a-zA-Z0-9]/', $senha)) {
    $serro = "";
} else {
    $serro = "%";
}

// Sequencia numeros
$encontrou_sequencia = false;

foreach ($sequencias as $sequencia) {
    if (strpos($senha, $sequencia) !== false) {
        $encontrou_sequencia = true;
        $serro = "52353";
        break;
    }
}

if (!$encontrou_sequencia) {
    $serro = "";
}

// Senha igual
if ($senha == $csenha) {
    $cserro = "";
} else {
    $cserro = "IGUAL";
}

function guardar($nome, $email, $senha) {
    $conn = mysqli_connect("localhost", "root", "", "clientespi");
    mysqli_set_charset($conn, "utf8");
    $sql = "insert into `clientes` (`cli_nome`, `cli_email`, `cli_senha`) values (?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);

    // Hash usando SHA256 e um Salt
    $salt = random_bytes(32);
    $salt_hex = bin2hex($salt);
    $hash = hash('sha256', $senha . $salt_hex);
    $hash_salt = $salt_hex . $hash;

    mysqli_stmt_bind_param($stmt, "sss", $nome, $email, $hash_salt);
    mysqli_stmt_execute($stmt);
    $_SESSION['msg_log'] = "Agora faça login!";
    header("location: login.php");
}

if($nerro == "" && $emerro == "" && $serro == "" && $cserro == "") {
    guardar($nome, $email, $senha);
} else {
    $_SESSION['msg_cad'] = "Insira os dados corretamente!"; 
    header("location: cadastro.php");
}


}
?>