var senhaInput = document.getElementById("senha");

senhaInput.addEventListener("input", function(event) {
  event.preventDefault();
  verificaSenha();
});

var senhaInput = document.getElementById("csenha");
senhaInput.addEventListener("input", function(event) {
  event.preventDefault();
  verificaSenhaIgual();
});

var Nomer = document.getElementById("nome");
senhaInput.addEventListener("input", function(event) {
  event.preventDefault();
  Nomer();
});

var Emar = document.getElementById("email");
senhaInput.addEventListener("input", function(event) {
  event.preventDefault();
  Emar();
});

function Emar() {
  var emaio = document.getElementById("email").value;
  if (emaio == ""){
    erru = "Esse campo é obrigatório."
  }

    // Tamanho
    if (emaio.length < 5 || emaio.length > 50) {
      erro = "O e-mail deve ter no maximo 50 caracteres.";
    }

  document.getElementById("email").setCustomValidity(erru);
}

function Nomer() {
  var nomin = document.getElementById("nome").value;
  if (nomin == ""){
    ero = "Esse campo é obrigatório."
  }

  // Tamanho
  if (nomin.length < 3 || nomin.length > 50) {
    erro = "O nome deve ter entre 3 e 50 caracteres.";
  }
  document.getElementById("email").setCustomValidity(ero);
}

function verificaSenha() {
  var senha = document.getElementById("senha").value;
  var erro = "";
  var sequencias = ["12", "23", "34", "45", "56", "67", "78", "89", "98", "87", "76", "65", "54", "43", "32", "21"];

  // Vazio
  if (senha == "") {
    erro = "Esse campo é obrigatório."
  }

  // Tamanho
  if (senha.length < 8 || senha.length > 64) {
    erro = "A senha deve ter entre 8 e 64 caracteres.";
  }

  // Espaços
  if (senha.indexOf(" ") != -1) {
    erro = "A senha não pode conter espaços em branco.";
  }

  // Maiúsculas e minúsculas
  var temMaiuscula = false;
  var temMinuscula = false;
  for (var i = 0; i < senha.length; i++) {
    if (senha[i] >= "A" && senha[i] <= "Z") {
      temMaiuscula = true;
    } else if (senha[i] >= "a" && senha[i] <= "z") {
      temMinuscula = true;
    }
  }
  if (!temMaiuscula || !temMinuscula) {
    erro = "A senha deve conter letras maiúsculas e minúsculas.";
  }

  // Caractere especial
  var temEspecial = false;
  var especiais = "!@#$%^&*()_+-=[]{}\\|;':\",./<>?";
  for (var i = 0; i < senha.length; i++) {
    if (especiais.indexOf(senha[i]) != -1) {
      temEspecial = true;
    }
  }
  if (!temEspecial) {
    erro = "A senha deve conter caracteres especiais.";
  }

  // Sequencia numeros
  for (var i = 0; i < sequencias.length; i++) {
    if (senha.indexOf(sequencias[i]) != -1) {
      erro = "A senha não pode conter sequências de números (\"123\", \"321\")";
    }
  }

  document.getElementById("senha").setCustomValidity(erro);
}

function verificaSenhaIgual() {
  var ssenha = document.getElementById("senha").value;
  var csenha = document.getElementById("csenha").value;
  error = "";

  // Senha igual
  if (ssenha != csenha) {
    error = "As senhas não coincidem";
  }
  
  document.getElementById("csenha").setCustomValidity(error);
}