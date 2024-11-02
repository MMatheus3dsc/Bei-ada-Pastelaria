<?php
session_start();
require "../src/conexao.php";

// Verifica se o usuário está autenticado
if (!isset($_SESSION['email'])) {
    header('Location: usuario/login.php');
    exit;
}
$email = $_SESSION['email'];

$db = new Database();
$pdo = $db->getConnection();

// Buscar os dados do usuário no banco de dados
$sql = "SELECT * FROM usuarios WHERE email = :email";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Verifica se o usuário foi encontrado
if (!$user) {
    echo "Usuário não encontrado.";
    exit;
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área do Usuário</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="../css/user.logado.css">
</head>
<body>
    <div class="container">
        <div class="sidebar">
            <div class="user-info">
                <img src="user-avatar.png" alt="Avatar do usuário">
                <p>Olá, <strong><?php echo htmlspecialchars($user['name']); ?></strong></p>
            </div>
            <nav>
                <ul>
                    <li><a href="#dados-pessoais">Dados pessoais</a></li>
                    <li><a href="#enderecos">Endereços</a></li>
                    <li><a href="#pedidos">Pedidos</a></li>
                    <li><a href="#cartoes">Cartões</a></li>
                    <li><a href="../index.php">Cartapio</a></li>
                    <li><a href="../sair.php">Sair</a></li>
                </ul>
            </nav>
        </div>
        <div class="main-content">
            <section id="dados-pessoais">
                <h1>Dados pessoais</h1>
                <div class="user-data">
                    <div>
                        <p><strong>Nome</strong><br> <?php echo htmlspecialchars($user['name']); ?></p>
                    </div>
                    <div>
                        <p><strong>Email</strong><br> <?php echo htmlspecialchars($user['email']); ?> </p>
                        <p><strong>Gênero</strong><br> <?php echo htmlspecialchars($user['genero']); ?> </p>
                    </div>
                    <div>
                        <p><strong>CPF</strong><br> <?php echo htmlspecialchars($user['cpf']); ?> </p>
                        <p><strong>Data de nascimento</strong><br> <?php echo htmlspecialchars($user['data_nascimento']); ?> </p>
                        <p><strong>Telefone</strong><br> <?php echo htmlspecialchars($user['phone']); ?> </p>
                    </div>
                </div>
            </section>
            <section id="enderecos">
                <h1>Endereços</h1>
                <p>Aqui você pode gerenciar seus endereços de entrega.</p>
                <!-- Adicione o conteúdo dos endereços aqui -->
            </section>
            <section id="pedidos">
                <h1>Pedidos</h1>
                <p>Acompanhe seus pedidos aqui.</p>
                <!-- Adicione o conteúdo dos pedidos aqui -->
            </section>
            <section id="cartoes">
                <h1>Cartões</h1>
                <p>Gerencie seus cartões de crédito/débito aqui.</p>
                <!-- Adicione o conteúdo dos cartões aqui -->
            </section>
            </section>
        </div>
    </div>
</body>
</html>
