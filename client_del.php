<?php
session_start();
@$access = $_SESSION['access'];
if($access == false) {
    $_SESSION['msg_log'] = "Área restrita, faça login para continuar!";
    header("location: login.php");
} else if ($_SESSION['access'] == true) {
?>
<?php
if ($_GET['verification'] == "true"){

$cod = $_SESSION['cod'];

$conn = mysqli_connect("localhost", "root", "", "clientespi");
mysqli_set_charset($conn, "utf8");

$sql = "DELETE FROM clientes WHERE cli_cod=\"$cod\"";

mysqli_query($conn, $sql);
mysqli_close($conn);
session_destroy();
header("location: index.php");
} else {
    header("location: client_area.php");
}
?>
<?php } else {
    $_SESSION['msg_log'] = "Área restrita, faça login para continuar!";
    header("location: login.php");
} ?>