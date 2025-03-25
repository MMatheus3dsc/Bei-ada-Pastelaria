<?php
session_start(); 
if (!isset($_SESSION['email'])) {
    header('Location: usuario/login.php');
    exit;
}
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/reset.css">
    <link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/index.css">
    <script defer src="/Bei-ada-Pastelaria-main/cart/cartActions.js"></script>
    <title>Beiçada no Pastel</title>
</head>
<body>
    <header class="fixed-menu">
        <nav>
            <ul>
                <li><a href="/Bei-ada-Pastelaria-main/usuario/login.php"> Entrar</a></li>
                <li><a href="#delivery">Delivery</a></li>
                <li><a href="#app">App</a></li>
                <li><a href="/Bei-ada-Pastelaria-main/usuario/user-logado.php">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Cardápio Digital</h2>

        <section class="container-salgado">
            <div class="container-salgado-titulo">
                <h3>Opções de Pastel Salgado</h3>
            </div>
            <div id="salgados" class="container-salgado-produtos"></div>
        </section>

        <section class="container-doce">
            <div class="container-doce-titulo">
                <h3>Opções de Pastel Doce</h3>
            </div>
            <div id="doces" class="container-doce-produtos"></div>
        </section>
    </main>

    <script>
        async function carregarProdutos() {
            try {
                const response = await fetch("http://localhost:8000/api/produtos");
                const produtos = await response.json();

                const salgadosContainer = document.getElementById("salgados");
                const docesContainer = document.getElementById("doces");

                produtos.forEach(produto => {
                    const produtoHTML = `
                        <div class="container-produto">
                            <div class="container-foto">
                                <img src="${produto.imagem}">
                            </div>
                            <p>${produto.nome}</p>
                            <p>${produto.descricao}</p>
                            <p>R$ ${produto.preco}</p>
                            <button onclick="addToCart(${produto.id})">Adicionar</button>
                        </div>
                    `;

                    if (produto.tipo === "salgado") {
                        salgadosContainer.innerHTML += produtoHTML;
                    } else {
                        docesContainer.innerHTML += produtoHTML;
                    }
                });
            } catch (error) {
                console.error("Erro ao carregar produtos:", error);
            }
        }

        carregarProdutos();
    </script>
</body>
</html>
