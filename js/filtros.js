


function validarFormulario(event) {
  // Pegar os valores dos campos do formulário
  var name = document.getElementById('name').value;
  var email = document.getElementById('email').value;
  var address = document.getElementById('address').value;
  var phone = document.getElementById('phone').value;
  var password = document.getElementById('password').value;
  var confirm_password = document.getElementById('confirm_password').value;

  // Verificar se o campo Nome está vazio
  if (name.trim() === '') {
      alert("Por favor, insira seu nome.");
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

// Função 
function validNome(name){

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
//document.getElementById('cadastro').addEventListener('submit', validarFormulario);
//document.getElementById('login'),addEventListener('submit', validEmail,validSenha);

