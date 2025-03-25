<?php
 


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

    <script src=""></script>
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
    <form method="POST" action="{{ route('cadastrar.produto') }}" enctype="multipart/form-data">
    @csrf <!-- Token de segurança obrigatório -->

    <label for="nome">Nome</label>
    <input type="text" id="nome" name="nome" placeholder="Digite o nome do produto" required>

    <div class="container-radio">
        <div>
            <label for="salgado">Salgado</label>
            <input type="radio" id="salgado" name="tipo" value="Salgado" checked>
        </div>
        <div>
            <label for="doce">Doce</label>
            <input type="radio" id="doce" name="tipo" value="doce">
        </div>
    </div>

    <label for="descricao">Descrição</label>
    <input type="text" id="descricao" name="descricao" placeholder="Digite uma descrição" required>

    <label for="preco">Preço</label>
    <input type="text" id="preco" name="preco" placeholder="Digite o preço" required>

    <label for="imagem">Envie uma imagem do produto</label>
    <input type="file" name="imagem" accept="image/*" id="imagem">

    <input type="submit" class="botao-cadastrar" value="Cadastrar produto">
</form>

    </section>
</main>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-maskmoney/3.0.2/jquery.maskMoney.min.js" integrity="sha512-Rdk63VC+1UYzGSgd3u2iadi0joUrcwX0IWp2rTh6KXFoAmgOjRS99Vynz1lJPT8dLjvo6JZOqpAHJyfCEZ5KoA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>
</html>