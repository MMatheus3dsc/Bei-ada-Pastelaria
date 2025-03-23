<?php
session_start(); 
// Verifica se o usuário está autenticado
if (!isset($_SESSION['email'])) {
    // Se não estiver autenticado, redireciona para a página de login
    header('Location: usuario/login.php');
    exit;
}
    require "src/conexao.php";
    require "src/modelo/ClassProduto.php";
    require "src/repositorio/produto-repositorio.php";
   $db = new Database();
   $pdo = $db->getConnection();
   $repositorio = new ProdutoRepositorio($pdo);
   $dadosSalgado = $repositorio->opcoesSalgado();
   $dadosDoce = $repositorio->opcoesDoce()
  
   
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="manifest" href="/site.webmanifest">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Barlow:wght@400;500;600;700&display=swap" rel="stylesheet">
    <title>Beiçada no Pastel</title>
    <script type="module" src="../shopping-cart/src/components/cart.js" defer></script>
</head>
<body>
    <header class="fixed-menu">
        <nav>
            <ul>
            
                <li><a href="./usuario/login.php"> Entrar</a></li>
                <li><a href="#delivry">Delivry</a></li>
                <li><a href="#app">App</a></li>
                <li><a href="/Bei-ada-Pastelaria-main/usuario/user-logado.php"> <svg width="22px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" stroke="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M16 7C16 9.20914 14.2091 11 12 11C9.79086 11 8 9.20914 8 7C8 4.79086 9.79086 3 12 3C14.2091 3 16 4.79086 16 7Z" stroke="#5e412f " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> <path d="M12 14C8.13401 14 5 17.134 5 21H19C19 17.134 15.866 14 12 14Z" stroke="#5e412f " stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg></a></li>
                <li><a href="#"><svg width="22px" height="22px" viewBox="0 0 1024.00 1024.00" class="icon" version="1.1" xmlns="http://www.w3.org/2000/svg" fill="#000000"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"><path d="M960.1 258.4H245.8l-36.1-169H63.9v44h110.2l26.7 125 100.3 469.9 530 0.4v-44l-494.4-0.3-22.6-105.9H832l128.1-320.1z m-65 44L855.6 401H276.3l-21.1-98.6h639.9zM304.8 534.5L279.7 417h569.5l-47 117.5H304.8z" fill="#5E412FF0781839393A"></path><path d="M375.6 810.6c28.7 0 52 23.3 52 52s-23.3 52-52 52-52-23.3-52-52 23.3-52 52-52m0-20c-39.7 0-72 32.2-72 72s32.2 72 72 72 72-32.2 72-72-32.3-72-72-72zM732 810.6c28.7 0 52 23.3 52 52s-23.3 52-52 52-52-23.3-52-52 23.3-52 52-52m0-20c-39.7 0-72 32.2-72 72s32.2 72 72 72c39.7 0 72-32.2 72-72s-32.3-72-72-72zM447.5 302.4h16v232.1h-16zM652 302.4h16v232.1h-16z" fill="#5E412FF07818"></path><path d="M276.3 401l3.4 16-3.4-16z" fill="#5E412FF07818343535"></path></g></svg></a></li>
            </ul>
        </nav>
    </header>
    <main>
        <header>
            <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/banner-beiçada.jpg" class="logo" alt="">
            </div>
        </section>
    </header>
        
        <h2>Cardápio Digital</h2>
        
        <section class="container-salgado">
            <div class="container-salgado-titulo">
                <h3>Opções de Pastel Salgado</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
            </div>
            <div class="container-salgado-produtos">
                <?php foreach ($dadosSalgado as $salgado) :?>
                <div class="container-produto">
                    
                    <div class="container-foto">
                    <img src="<?= $salgado-> getImagemRaiz() ?>">
                    </div>
                    <p> <?=  $salgado->getNome()?> </p>
                    <p> <?=  $salgado->getDescricao()?> </p>
                    <p> <?=  $salgado->getPrecoFormatado()?> </p>
                    <button onclick= addToCart() >carin</button>
                    
                </div>
                <?php endforeach ?>
            </div>
        </section>
        <section class="container-doce">
             <div class="container-doce-titulo">
                <h3>Opções de Pastel Doce</h3>
                <img class= "ornaments" src="img/ornaments-coffee.png" alt="ornaments">
             </div>
             <div class="container-doce-produtos" >
             <?php foreach ($dadosDoce as $doce) :?>
                <div class="container-produto">
                    
                    <div class="container-foto">
                    <img src="<?= $doce-> getImagemRaiz() ?>">
                    </div>
                    <p> <?=  $doce->getNome()?> </p>
                    <p> <?=  $doce->getDescricao()?> </p>
                    <p> <?=  $doce->getPrecoFormatado()?> </p>
                
                </div>
                <?php endforeach ?>
             </div>
            
        </section>
        
       
    </main>
    

    <script src="./cart/cartActions.js"></script>
</body>
</html>