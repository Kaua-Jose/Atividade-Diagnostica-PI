<?php

session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$conn = mysqli_connect("localhost", "root", "", "clientespi");
mysqli_set_charset($conn, "utf8");

$sqlemail = "select cli_cod, cli_email, cli_senha from `clientes` where cli_email=\"$email\"";

$result = mysqli_query($conn, $sqlemail);

if (mysqli_num_rows($result) > 0){
    $dado = mysqli_fetch_assoc($result);

    $hash_original = $dado['cli_senha'];

    $salt_hex = substr($hash_original, 0, 64);
    $hash = substr($hash_original, 64);

    $senha_hashed = hash('sha256', $senha . $salt_hex);

    if($senha_hashed === $hash) {
        $_SESSION['access'] = true;
        $_SESSION['cod'] = $dado['cli_cod'];
        mysqli_close($conn);
        header("location: client_area.php");
    } else {
        $_SESSION['access'] = false;
        $_SESSION['msg_log'] = "E-Mail não cadastrado ou senha incorreta!";
        mysqli_close($conn);
        header("location: login.php");
    }
    
} else {
    $_SESSION['access'] = false;
    $_SESSION['msg_log'] = "E-Mail não cadastrado ou senha incorreta!";
    mysqli_close($conn);
    header("location: login.php");
}

?>