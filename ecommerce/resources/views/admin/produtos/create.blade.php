@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/reset.css">
<link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/admin.css">
<link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/form.css">
<main>

<section class="container-admin-banner">
        <a href="{{ route('produtos.index') }}"><img src="{{ asset('img/banner-beiçada.jpg') }}" class="logo-admin" alt="logo-beicada"></a> 
        <h1>Cadastrar Produto</h1>
        <img class="ornaments" src="{{ asset('img/ornaments-coffee.png') }}" alt="ornaments">
</section>

<section class="container-form">
    <form id="produto-form" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome" placeholder="Nome do produto" required value="{{ old('nome') }}">
        </div>

        <div class="container-radio">
            <label for="salgado">Salgado</label>
            <input type="radio" id="salgado" name="tipo" value="Salgado" required>
            
            <label for="doce">Doce</label>
            <input type="radio" id="doce" name="tipo" value="Doce" required>
        </div>

        <div class="form-group">
            <label for="descricao">Descrição</label>
            <textarea id="descricao" name="descricao" class="form-input" placeholder="Digite uma descrição" required>{{ old('descricao') }}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" id="preco" name="preco" placeholder="Digite o preço" required>
        </div>  

        <div class="form-group">
            <label for="imagem">Imagem do Produto</label>
            <input type="file" name="imagem" accept="image/*" id="imagem">
        </div>

        <button type="submit" class="botao-cadastrar">Cadastrar Produto</button>
    </form>
</section>

<script src="/Bei-ada-Pastelaria-main/public/js/ajaxProdutos.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.getElementById('produto-form').addEventListener('submit', async function (event) {
            event.preventDefault();
            await createProduct();
        });
    });
</script>



</main>
@endsection