var senhaInput = document.getElementById("senha");
senhaInput.addEventListener("input", function(event) {
  event.preventDefault();
  verificaSenha();
});

var emailInput = document.getElementById("email");
emailInput.addEventListener("input", function(event) {
  event.preventDefault();
  verificaEmail();
});


function verificaSenha() {
  var senha = document.getElementById("senha").value;
  var erro = "";

  if (senha == "")
  {
    erro = "A senha não pode estar vazia.";
  }

  document.getElementById("senha").setCustomValidity(erro);
}

function verificaEmail() {
  var email = document.getElementById("email").value;
  error = "";

  if (email == "")
  {
    error = "O e-mail não pode estar vazio.";
  }

  if (/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    console.log("Endereço de email válido.");
  } else {
    error = "Insira um e-mail válido.";
  }

  document.getElementById("email").setCustomValidity(error);
}