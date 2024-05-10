<?php

    require "src/conexao.php";
    require "src/modelo/ClassProduto.php";
    require "src/repositorio/produto-repositorio.php";

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
</head>
<body>
    <main>
        <section class="container-banner">
            <div class="container-texto-banner">
                <img src="img/banner-beiçada.jpg" class="logo" alt="">
            </div>
        </section>
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
</body>
</html>