<<<<<<< HEAD
// Funções de Validação
function isFieldEmpty(field, message, event) {
  if (field.trim() === '') {
      alert(message);
      event.preventDefault();
      return true;
  }
  return false;
}

function isValidRegex(value, regex, message, event) {
  if (!regex.test(value)) {
      alert(message);
      event.preventDefault();
      return false;
  }
  return true;
}

function showError(id, message) {
  const errorElement = document.getElementById(id);
  errorElement.textContent = message;
  errorElement.style.display = 'block';
}

function hideErrors() {
  const errors = document.querySelectorAll('.error-message');
  errors.forEach(error => error.style.display = 'none');
}
function validarFormularioCadastro(event) {
  const fields = {
      nome: { value: document.getElementById('name').value, message: "Por favor, insira seu nome.", minLen: 2,errorId: "nome-erro"},
      cpf: { value: document.getElementById('cpf').value, message: "Por favor, insira seu CPF.", regex: /^\d{11}$/ },
      dataNascimento: { value: document.getElementById('data_nascimento').value, message: "Data de nascimento inválida.", regex: /^\d{4}-\d{2}-\d{2}$/,errorId: "cpf-erro" },
      email: { value: document.getElementById('email').value, message: "Email inválido.", regex: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,errorId: "email-erro" },
      telefone: { value: document.getElementById('phone').value, message: "Telefone inválido.", regex: /^\d+$/, errorId: " telefone-erro"},
      genero: { value: document.getElementById('genero').value, message: "Por favor, selecione seu gênero." },
      senha: { value: document.getElementById('password').value, message: "Senha deve ter pelo menos 6 caracteres.", minLen: 6 ,errorId: "senha-erro"},
      confirmarSenha: { value: document.getElementById('confirm_password').value, message: "As senhas não coincidem.", match: document.getElementById('password').value,errorId: "semha-erro" }
  };

  for (let key in fields) {
      const field = fields[key];
      if (isFieldEmpty(field.value, field.message, event)) return;

      if (field.minLen && field.value.length < field.minLen) {
          alert(field.message);
          event.preventDefault();
          return;
      }
      
      if (field.regex && !isValidRegex(field.value, field.regex, field.message, event)) return;

      if (field.match && field.value !== field.match) {
          alert(field.message);
          event.preventDefault();
          return;
      }
      if (field.value.trim() === '') {
        showError(field.errorId, field.message);
        event.preventDefault();
        return;
    }

    if (field.minLen && field.value.length < field.minLen) {
        showError(field.errorId, field.message);
        event.preventDefault();
        return;
    }

    if (field.regex && !field.regex.test(field.value)) {
        showError(field.errorId, field.message);
        event.preventDefault();
        return;
    }

  }
}

function validarFormularioLogin(event) {
  const email = document.getElementById('email').value;
  const senha = document.getElementById('password').value;

  if (isFieldEmpty(email, "Por favor, insira seu email.", event)) return;
  if (!isValidRegex(email, /^[^\s@]+@[^\s@]+\.[^\s@]+$/, "Por favor, insira um email válido.", event)) return;

  if (isFieldEmpty(senha, "Por favor, insira sua senha.", event)) return;
  if (senha.length < 6) {
      alert("A senha deve ter pelo menos 6 caracteres.");
      event.preventDefault();
  }
}

// Adicionar eventos de submit
document.getElementById('cadastro').addEventListener('submit', validarFormularioCadastro);
document.getElementById('login').addEventListener('submit', validarFormularioLogin);
=======



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
>>>>>>> eeec17efb49405bb797e58508d73a43607a37faf
