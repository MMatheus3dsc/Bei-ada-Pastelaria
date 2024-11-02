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
