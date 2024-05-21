<?php
require "src/conexao.php";
require "src/modelo/ClassUsuario.php";
require "src/repositorio/users-repositorio.php";

$db = new Database();
$pdo = $db->getConnection();

if (!$pdo) {
    die("Falha na conexão com o banco de dados.");
}

if (isset($_POST['cadastro-user'])) {
    $usuario = new Usuario(
        null,
        $_POST['name'],
        $_POST['email'],
        $_POST['address'],
        $_POST['phone'],
        $_POST['password']
    );

    $repositorioCadastro = new UsuarioRepositorio($pdo);
    try {
        $repositorioCadastro->cadastrarUsuario($usuario);
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        echo 'Erro ao cadastrar o usuário: ' . $e->getMessage();
    }
}
?>



<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
  <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/cadastro-usuario.css">
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
    <form id="cadastro" action="#" method="POST">
      <div class="form-group">
        <label for="username">Nome</label>
        <input type="text" id="name" name="name" placeholder="Nome completo" required>
      </div>
      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="endereco">Endereço</label>
        <input type="text" id="address" name="address" placeholder="Endereço">
      </div>
      <div class="form-group">
        <label for="telephone">Telefone</label>
        <input type="tell" id="phone" name="phone" placeholder='Telefone' >
      </div>
      <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" placeholder="Senha" required>
      </div>
      <div class="form-group">
        <label for="confirm_password">Confirme a Senha:</label>
        <input type="password" id="confirm_password" name="confirm_password" placeholder="Confirme sua senha" required>
      </div>
      <div class="form-group">
        <button type="submit" name="cadastro-user">Cadastrar</button>
      </div>
    </form>
  </div>

  <script type="module" src ="./js/filtros.js"></script>
</body>
</html>
