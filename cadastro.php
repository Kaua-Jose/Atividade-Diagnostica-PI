<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Página de Cadastro</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</head>
<?php
session_start();
@$msg = $_SESSION['msg_cad'];
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
<div class="d-flex align-items-center" style="height: 88vh;">
	<div class="card container col-md-6 mx-auto">
		<form class="mx-auto row justify-content-center m-2" method="post" action="cadastro_guardar.php">
			<h1 class="text-center">Cadastro</h1><hr>
			<label for="nome-cadastro" class="text-center" id="tnome">Nome*
				<input type="text" id="nome" class="form-control m-1" name="nome" placeholder="Digite seu nome" required minlength="3" maxlength="50" oninvalid="this.setCustomValidity('O nome deve ter entre 3 e 50 caracteres.')" oninput="this.setCustomValidity('')">
			</label>
			<label for="e-mail" class="text-center" id="temail">E-Mail*
				<input type="mail" id="email" class="form-control m-1" name="email" placeholder="Digite seu e-mail" required>
			</label>
			<label for="senha" class="text-center" id="tsenha">Senha*
				<input type="password" class="form-control m-1" id="senha" name="senha" placeholder="Digite uma senha" required>
			</label>
			<label for="confirmar" class="text-center" id="tcsenha">Confirmar senha*
				<input type="password" class="form-control m-1" name="csenha" id="csenha" placeholder="Confirme a senha" required>
			</label>
			<p style="color: red;" class="text-center"><?php echo $msg; $_SESSION['msg_cad'] = ""; ?></p>
			<label for="submit" class="text-center">
				<input type="submit" class="btn btn-primary m-1" value="Cadastrar">
			</label>
            <a href="login.php" class="text-center">Já é cadastrado? Então faça o login aqui.</a>
		</form>
		<script src="scripts/verif_cadastro.js"></script>
	</div>
</div>
</body>
</html>