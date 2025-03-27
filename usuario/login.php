<?php

?>




<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
  <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="../public/css/reset.css">
  <link rel="stylesheet" href="../public/css/login.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="" type="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <script src="../public/js/ajaxLogin.js" ></script>
  <title>Tela de Login</title>
</head>
<body>
  <div class="login-container">
    <h2>Tela de Login</h2>
    <form id="login-form">
    <input type="hidden" id="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="E-mail" autofocus required>
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password" placeholder="Senha" required>
    </div>
    <div class="form-group">
        <button type="submit">Entrar</button>
    </div>
</form>
<p id="error-message" style="color: red;"></p>

    <div class="signup-link">
      <span>Não tem uma conta? <a href="cadastro-usuario.php">Cadastre-se</a></span>
    </div>
  </div>

  <script type="module" src ="../public/js/filtros.js"></script>
</body>

</html>
