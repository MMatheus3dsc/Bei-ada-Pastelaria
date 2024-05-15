<!DOCTYPE html>
<html lang="pt-BR">
<head>
<meta charset="UTF-8">
  <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/login.css">
  <link rel="stylesheet" href="css/cadastro-usuario.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="" type="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Tela de Login</title>
</head>
<body>
  <div class="login-container">
    <h2>Tela de Login</h2>
    <form id="login" action="#" method="POST">
      <div class="form-group">
        <label for="username">Email</label>
        <input type="email" id="email" placeholder="E-mail" autofocus>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password"  placeholder="Senha" required>
      </div>
      <div class="form-group">
        <button type="submit">Entrar</button>
      </div>
    </form>
    <div class="signup-link">
      <span>Não tem uma conta? <a href="cadastro-usuario.php">Cadastre-se</a></span>
    </div>
  </div>

  <script type="module" src ="./js/filtros.js"></script>
</body>

</html>
