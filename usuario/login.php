<?php
session_start(); // Inicia a sessão

if (empty($_SESSION['csrf_token'])) {
  $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
  if (!empty($_POST["email"]) && !empty($_POST['password']) && !empty($_POST['csrf_token'])) {
      if (hash_equals($_SESSION['csrf_token'], $_POST['csrf_token'])) {
          $email = $_POST['email'];
          $password = $_POST['password'];
      } else {
          echo "Token CSRF inválido.";
          exit;
      }
  } else {
      echo "Por favor, preencha todos os campos.";
      exit;
  }
}



require "../src/conexao.php";

$db = new Database();
$pdo = $db->getConnection();

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Verificar se os campos não estão vazios
    if (!empty($_POST["email"]) && !empty($_POST['password'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Usar prepared statement para proteção contra SQL injection
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':email', $email);

        if ($stmt->execute()) {
            // Verificar se o usuário existe
            if ($stmt->rowCount() > 0) {
                $user = $stmt->fetch(PDO::FETCH_ASSOC);

                // Verificar a senha
                if (password_verify($password, $user['password'])) {
                    // Usuário autenticado, criar uma sessão para ele
                    $_SESSION['email'] = $email;
                    $_SESSION['is_admin'] = ($email === 'matheusdossantoscarolino@gmail.com'); // Verificação do usuário autorizado
                    // Redirecionar para a página de administração
                    header('Location: ../admin.php');
                    exit;
                } else {
                    // Senha incorreta
                    header('Location: ../usuario/login.php?error=invalid_password');
                    exit;
                }
            } else {
                // Usuário não encontrado
                header('Location: ../usuario/login.php?error=user_not_found');
                exit;
            }
        } else {
            echo "Erro ao executar a consulta.";
            exit;
        }
    } else {
        echo "Por favor, preencha todos os campos.";
        exit;
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
  <link rel="stylesheet" href="../css/login.css">
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
    <form id="login" action="login.php" method="POST">
    <input type="hidden" name="csrf_token" value="<?php echo $_SESSION['csrf_token']; ?>">
      <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" placeholder="E-mail" autofocus>
      </div>
      <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" id="password" name="password"  placeholder="Senha" required>
      </div>
      <div class="form-group">
        <button type="submit" name="submit" >Entrar</button>
      </div>
    </form>
    <?php
    if (isset($_GET['error'])) {
        if ($_GET['error'] == 'invalid_password') {
            echo "<p style='color: red;'>Senha inválida. Tente novamente.</p>";
        } elseif ($_GET['error'] == 'user_not_found') {
            echo "<p style='color: red;'>Usuário não encontrado. Tente novamente.</p>";
        }
      }
        ?>
    <div class="signup-link">
      <span>Não tem uma conta? <a href="cadastro-usuario.php">Cadastre-se</a></span>
    </div>
  </div>

  <script type="module" src ="../js/filtros.js"></script>
</body>

</html>
