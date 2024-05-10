<?php
   require "src/conexao.php";
   require "src/modelo/ClassProduto.php";
   require "src/repositorio/produto-repositorio.php";

   $Repositorio = new produtoRepositorio($pdo);
   if (isset($_POST['editar'])) {
    $produto = new Produto($_POST['id'], $_POST['tipo'], $_POST['nome'], $_POST['descricao'], $_POST['preco']);

    if (($_FILES["imagem"] ['error'] == UPLOAD_ERR_OK  )){ /* metodo error para verificar se não houve erro no upload */ 
      $produto->setImagem(uniqid() . $_FILES['imagem']['name']);  //pega a imagem da instancia do produto e cria uma indetificação unica
      move_uploaded_file($_FILES['imagem']['tmp_name'], $produto->getImagemRaiz()); // encaminha a imagem upada de sua matriz temporaria até o diretorio raiz do projeto
     
  }
    $Repositorio->atualizar($produto);
    header("Location: admin.php");
} else {
    $produto = $Repositorio->buscarEditar($_GET['id']);
   }


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
  <link rel="stylesheet" href="css/form.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="icon" href="img/" type="image/">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
  <title>Beiçada - Editar Produto</title>
</head>
<body>
<main>
  <section class="container-admin-banner">
    <a href="admin.php"><img src="img/banner-beiçada.jpg" class="logo-admin" alt="logo-beicada"></a>
    <h1>Editar Produto</h1>
    <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
  </section>
  <section class="container-form">
    <form method="post" enctype="multipart/form-data">

  <label for="nome">Nome</label>
  <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" value="<?= $produto->getNome()?>" required>

  <div class="container-radio">
    <div>
        <label for="salgado">Salgado</label>
        <input type="radio" id="salgado" name="tipo" value="salgado" <?= $produto->getTipo() == "Salgado"? "checked" : "" ?>>
    </div>
    <div>
        <label for="doce">Doce</label>
        <input type="radio" id="doce" name="tipo" value="doce" <?= $produto->getTipo() == "doce"? "checked" : "" ?>>
    </div>
  </div>

  <label for="descricao">Descrição</label>
  <input type="text" name="descricao" id="descricao" value="<?= $produto->getDescricao()?>" placeholder="Digite uma descrição" required>

  <label for="preco">Preço</label>
  <input type="text" name="preco" id="preco" value="<?= number_format($produto->getPreco(),2)?>" placeholder="Digite uma descrição" required>

  <label for="imagem">Envie uma imagem do produto</label>
  <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">
    <input type="hidden" name="id" value="<?= $produto->getId()?>">
  <input type="submit" name="editar" class="botao-cadastrar" value="Editar produto"/>
  </form>


  </section>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>