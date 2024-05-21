<?php
 require "src/conexao.php";
 require "src/modelo/ClassProduto.php";
 require "src/repositorio/produto-repositorio.php";
 $db = new Database();
 $pdo = $db->getConnection();

 if (isset($_POST['cadastro-produto'])){
    $produto = new Produto(null,
    $_POST['tipo'],
    $_POST['nome'],
    $_POST['descricao'],
    $_POST['preco'],
    
);
if (isset($_FILES["imagem"])){ 
    $produto->setImagem(uniqid().$_FILES["imagem"]["name"]);
    move_uploaded_file($_FILES["imagem"]["tmp_name"],$produto->getImagemRaiz());
}
 

$repositorioCadastro = new ProdutoRepositorio($pdo);
 $repositorioCadastro->salvar($produto);
 header("location: admin.php");
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
    <title>Beiçada - Cadastrar Produto</title>
</head>
<body>
<main>
    <section class="container-admin-banner">
        <a href="admin.php"><img src="img/banner-beiçada.jpg" class="logo-admin" alt="logo-serenatto"></a>
        <h1>Cadastro de Produtos</h1>
        <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
    </section>
    <section class="container-form">
        <form method="post" enctype="multipart/form-data">

            <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>
            <div class="container-radio">
                <div>
                    <label for="cafe">salgado</label>
                    <input type="radio" id="salgado" name="tipo" value="Salgado" checked>
                </div>
                <div>
                    <label for="doce">doce</label>
                    <input type="radio" id="doce" name="tipo" value="doce" >
                </div>
            </div>
            <label for="descricao">Descrição</label>
            <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>

            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Digite uma descrição" required>

            <label for="imagem">Envie uma imagem do produto</label>
            <input type="file" name="imagem" accept="image/*" id="imagem" placeholder="Envie uma imagem">

            <input type="submit" name="cadastro-produto" class="botao-cadastrar" value="Cadastrar produto"/>
        </form>
    
    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>