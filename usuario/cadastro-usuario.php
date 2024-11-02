<?php
require "../src/conexao.php";
require "../src/modelo/ClassUsuario.php";
require "../src/repositorio/users-repositorio.php";

$db = new Database();
$pdo = $db->getConnection();

if (!$pdo) {
    die("Falha na conexão com o banco de dados.");
}

if (isset($_POST['cadastro-user'])) {
    $usuario = new Usuario(
        null,
        $_POST['name'],
        $_POST['cpf'],
        $_POST['data_nascimento'],
        $_POST['email'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['genero'],
        $_POST['password']
    );

    $repositorioCadastro = new UsuarioRepositorio($pdo);
    try {
        $repositorioCadastro->cadastrarUsuario($usuario);
        header( "Location: login.php");
        echo("cadastro realizado");
        exit;
    } catch (InvalidArgumentException $e) {
      $erro = $e->getMessage();
  }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
  <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../css/reset.css">
  <link rel="stylesheet" href="../css/cadastro-usuario.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="" type="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Cadastro</title>
</head>
<body>
  <div class="signup-container">
    <h2>Cadastro</h2>
    <form id="cadastro" action="" method="POST">
      <div class="form-group">
        <label for="username">Nome:</label>
        <input type="text" id="name" name="name" placeholder="Nome completo" required>
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="Cpf">CPF:</label>
        <input type="text" id="cpf" name="cpf" placeholder="Cpf" required>
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="date">Data de Nascimento:</label>
        <input type="date" id="data_nascimento" name="data_nascimento" required>
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="endereco">Endereço:</label>
        <input type="text" id="address" name="address" placeholder="Endereço">
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="telephone">Telefone:</label>
        <input type="tell" id="phone" name="phone" placeholder='Telefone' >
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
      <label>Gênero:</label>
        <input type="radio" id="masculino" name="genero" value="masculino" required>
        <label for="masculino">Masculino</label><br>
        <input type="radio" id="feminino" name="genero" value="feminino" required>
        <label for="feminino">Feminino</label><br>
        <input type="radio" id="outro" name="genero" value="outro" required>
        <label for="outro">Outro</label><br>
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" placeholder="Senha" required>
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirme a Senha:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme sua senha" required>
        <span class="error-message" id="name-error"></span>
      </div>
      <div class="form-group">
        <button type="submit" name="cadastro-user">Cadastrar</button>
      </div>
      <?php if ($erro): ?>
            <p class="error-message"><?= htmlspecialchars($erro) ?></p>
        <?php endif; ?>
    </form>
  </div>

  <script type="module" src ="../js/filtros.js"></script>
</body>
</html>
