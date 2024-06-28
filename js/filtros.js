


function validarFormulario(event) {
  // Pegar os valores dos campos do formulário
  var name = document.getElementById('name').value;
  var cpf = document.getElementById('cpf').value;
  var data_nascimento = document.getElementById('data_nascimento').value;
  var email = document.getElementById('email').value;
  var address = document.getElementById('address').value;
  var phone = document.getElementById('phone').value;
  var genero = document.getElementById('genero').value;
  var password = document.getElementById('password').value;
  var confirm_password = document.getElementById('confirm_password').value;

  // Verificar se o campo Nome está vazio
  if (name.trim() === '') {
      alert("Por favor, insira seu nome.");
      event.preventDefault(); // Impede o envio do formulário
      return;
  }
  if (cpf.trim() === '') {
    alert("Por favor, insira seu CPF.");
    event.preventDefault(); // Impede o envio do formulário
    return;
  } else if (!validCpf(cpf)) {
    alert("Por favor, insira um CPF válido.");
    event.preventDefault(); // Impede o envio do formulário
    return;
  }

  // Verificar se o campo Data de Nascimento está vazio e tem formato válido
  if (data_nascimento.trim() === '') {
    alert("Por favor, insira sua data de nascimento.");
    event.preventDefault(); // Impede o envio do formulário
    return;
  } else if (!validDataNascimento(data_nascimento)) {
    alert("Por favor, insira uma data de nascimento válida. Use o formato YYYY-MM-DD.");
    event.preventDefault(); // Impede o envio do formulário
    return;
  }

  // Verificar se o campo Email está vazio e tem formato válido
  if (email.trim() === '') {
      alert("Por favor, insira seu email.");
      event.preventDefault(); 
      return;
  } else if (!validEmail(email)) {
      alert("Por favor, insira um email válido.");
      event.preventDefault(); 
      return;
  }

  // Verificar se o campo Endereço está vazio
  if (address.trim() === '') {
      alert("Por favor, insira seu endereço.");
      event.preventDefault(); 
      return;
  }

  // Verificar se o campo Telefone está vazio
  if (phone.trim() === '') {
      alert("Por favor, insira seu telefone.");
      event.preventDefault(); 
      return;
  }
  if (genero.trim() === '') {
    alert("Por favor, insira seu gênero.");
    event.preventDefault();
    return;
  }

  // Verificar se o campo Senha está vazio
  if (password.trim() === '' && validSenha ) {
      alert("Por favor, insira sua senha.");
      event.preventDefault(); // Impede o envio do formulário
      return; 
    }

  // Verificar se as senhas coincidem
  if (password !== confirm_password) {
      alert("As senhas não coincidem.");
      event.preventDefault(); // Impede o envio do formulário
      return;
  }
}

// Funçoes de validação

function validCpf(cpf) {
  var cpfRegex = /^\d{11}$/;
  return cpfRegex.test(cpf);
}

function validDataNascimento(data_nascimento) {
  var dataRegex = /^\d{4}-\d{2}-\d{2}$/;
  return dataRegex.test(data_nascimento);
}

function validEmail(email) {
  var emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/;
  return emailRegex.test(email);
}
function validSenha(senha,minDigitos){
  if(senha.length >= minDigitos){
       return true;
  }else{
      return false;
  }
  }
// Adicionar evento de submit ao formulário
document.getElementById('cadastro').addEventListener('submit', validarFormulario);

document.getElementById('login').addEventListener('submit', function(event) {
  const email = document.getElementById('email').value;
  const senha = document.getElementById('password').value;

  if (!validEmail(email)) {
    alert("Por favor, insira um email válido.");
    event.preventDefault();
    return;
  }

  if (!validSenha(senha, 8)) {
    alert("A senha deve ter pelo menos 6 caracteres.");
    event.preventDefault();
    return;
  }
});
