<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Página de Inicial</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js"></script>
</head>
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
<div class="d-flex align-items-center" style="height: 80vh;">
	<div class="card container col-md-6 mx-auto">
        <label for="msg" class="m-4">
            <h2 class="text-center">Bem vindo ao sistema.</h1>
            <h4 class="text-center">Faça <a href="login.php">login</a> ou <a href="cadastro.php">Cadastre-se</a>.</h2>
        </label>    
	</div>
</div>
</body>
</html>
