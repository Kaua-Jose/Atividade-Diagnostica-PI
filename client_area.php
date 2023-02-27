<?php
session_start();
@$access = $_SESSION['access'];
if($access == false) {
    $_SESSION['msg_log'] = "Área restrita, faça login para continuar!";
    header("location: login.php");
} else if ($_SESSION['access'] == true) {
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Área do Cliente</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</head>
<?php
$cod = $_SESSION['cod'];
?>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 8vh;">
    <div class="container d-flex justify-content-center">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cadastro.php">Cadastro</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="client_area.php">Área do Cliente</a>
        </li>
        </ul>
    </div>
    </div>
</nav>
<?php
$conn = mysqli_connect("localhost", "root", "", "clientespi");
mysqli_set_charset($conn, "utf8");

$sql = "select cli_cod, cli_email, cli_nome, cli_senha from `clientes` where cli_cod=\"$cod\"";
$result = mysqli_query($conn, $sql);
$dado = mysqli_fetch_assoc($result);

@$msg = $_SESSION['msg_cli']; 
?>
<div class="d-flex align-items-center" style="height: 90vh;">
	<div class="card container col-md-6 mx-auto">
        <label for="message" class="text-center m-2">
            <h2>Bem vindo <?php echo $dado['cli_nome']; ?></h2>
            <h4>Você pode editar seus dados aqui:</h4>
        </label>
        <label for="editor" class="text-center">
            <form action="client_edit.php" method="post" class="mx-auto row justify-content-center m-2">
                <label for="nome-cadastro" class="text-center" id="tnome">Novo nome*
                    <input value="<?php echo $dado['cli_nome']; ?>" type="text" id="nome" class="form-control m-1" name="nome" placeholder="Digite seu nome" required minlength="3" maxlength="50" oninvalid="this.setCustomValidity('O nome deve ter entre 3 e 50 caracteres.')" oninput="this.setCustomValidity('')">
                </label>
                <label for="e-mail" class="text-center" id="temail">Novo e-mail*
                    <input value="<?php echo $dado['cli_email']; ?>" type="mail" id="email" class="form-control m-1" name="email" placeholder="Digite seu e-mail" required>
                </label>
                <label for="senha" class="text-center" id="tsenha">Nova senha*
                    <input type="password" class="form-control m-1" id="senha" name="senha" placeholder="Digite uma senha" required>
                </label>
                <label for="confirmar" class="text-center" id="tcsenha">Confirmar nova senha*
                    <input type="password" class="form-control m-1" name="csenha" id="csenha" placeholder="Confirme a senha" required>
                </label>
                <p style="color: red;" class="text-center"><?php echo $msg; $_SESSION['msg_cli'] = ""; ?></p>
                <input type="submit" class="btn btn-primary m-2" value="Editar dados">
                <a class="btn btn-danger m-2" onclick="del_confirm()">Excluir Cadastro</a>
                <a class="btn btn-danger m-2" href="logout.php">Desconectar</a>
		        <script src="scripts/verif_cadastro.js"></script>
                <script>
                    function del_confirm() {
                        if (confirm("Deseja realmente deletar seu cadastro?")) {
                            window.location.href = "client_del.php?verification=true";
                        }
                    }
                </script>
            </form>
        </label>
	</div>
</div>
</body>
</html>

<?php 
mysqli_close($conn);
} else {
    $_SESSION['msg_log'] = "Área restrita, faça login para continuar!";
    header("location: login.php");
} ?>