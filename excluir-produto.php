<?php

require "src/conexao.php";
require "src/modelo/ClassProduto.php";
require "src/repositorio/produto-repositorio.php";
$db = new Database();
   $pdo = $db->getConnection();
$delect =new ProdutoRepositorio($pdo);
$delect->deletar($_POST["id"]);

header('Location: admin.php');