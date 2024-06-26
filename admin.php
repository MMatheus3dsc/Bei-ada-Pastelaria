<?php

session_start(); 
// Verifica se o usuário está autenticado e se é o usuário permitido
if (!isset($_SESSION['email']) || !isset($_SESSION['is_admin']) || !$_SESSION['is_admin']) {
  // Se não estiver autenticado ou não for o usuário permitido, redireciona para a página de login
  header('Location: /pastelaria/usuario/login.php');
  exit;
}
   require "src/conexao.php";
   require "src/modelo/ClassProduto.php";
   require "src/repositorio/produto-repositorio.php";
   $db = new Database();
   $pdo = $db->getConnection();
  $repositorio = new ProdutoRepositorio($pdo);
  $produtos = $repositorio->buscarTodos();

  


?>
<!doctype html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/reset.css">
  <link rel="stylesheet" href="css/index.css">
  <link rel="stylesheet" href="css/admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="" type="">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Beiçada - Admin</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
   <a href="index.php"><img src="img/banner-beiçada.jpg" class="logo-admin" alt="logo-beicada"></a> 
    <h1>Admistração Beiçada</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <h2>Lista de Produtos</h2>

  <section class="container-table">
    <table>
      <thead>
        <tr>
          <th>Produto</th>
          <th>Tipo</th>
          <th>Descricão</th>
          <th>Valor</th>
          <th colspan="2">Ação</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach( $produtos as $produto ) : ?>
      <tr>
        <td> <?= $produto->getNome()  ?> </td>
        <td><?= $produto->getTipo() ?></td>
        <td><?= $produto->getDescricao() ?></td>
        <td><?= $produto->getPrecoFormatado() ?></td>
        <td><a class="botao-editar" href="editar-produto.php?id=<?= $produto->getId() ?>">Editar</a></td>

        <td>
          <form action="excluir-produto.php" method="post">
            <input type="hidden" name= "id" value="<?= $produto->getId()?>">
            <input type="submit" class="botao-excluir" value="Excluir">
          </form>
        </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <a class="botao-cadastrar" href="cadastrar-produto.php">Cadastrar produto</a>
  <form action="Gerador_de_pdf.php" method="post">
    <input type="submit" class="botao-cadastrar" value="Baixar Relatório"/>
  </form>
  <a class="botao-sair" href="sair.php">Logout</a>
  </section>
</main>
</body>
</html>