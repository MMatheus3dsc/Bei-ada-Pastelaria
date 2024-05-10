<?php

require "src/conexao.php";
require "src/modelo/ClassProduto.php";
require "src/repositorio/produto-repositorio.php";

$delect =new ProdutoRepositorio($pdo);
$delect->deletar($_POST["id"]);

header('Location: admin.php');