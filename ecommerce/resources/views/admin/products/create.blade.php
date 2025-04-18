@extends('layouts.app')

@section('content')

@push('styles')
    <!-- Use a função asset() para gerar URLs corretas -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush


<main>

<section class="container-admin-banner">
        <a href="{{ route('admin.products.index') }}"><img src="{{ asset('img/banner-beiçada.jpg') }}" class="logo-admin" alt="logo-beicada"></a> 
        <h1>Cadastrar Produto</h1>
        <img class="ornaments" src="{{ asset('img/ornaments-coffee.png') }}" alt="ornaments">
</section>

<section class="container-form">
<form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" id="name" name="name" placeholder="Nome do produto" required value="{{ old('name') }}">
        </div>

        <div class="form-group">
        <label>Tipo:</label>
        <div class="container-radio">
            <label class="radio-option">
                <input type="radio" name="type" value="salgado" {{ old('type') == 'salgado' ? 'checked' : '' }} required>
                Salgado
            </label>
            
            <label class="radio-option">
                <input type="radio" name="type" value="doce" {{ old('type') == 'doce' ? 'checked' : '' }}>
                Doce
            </label>
        </div>
        </div>

        <div class="form-group">
            <label for="description">Descrição</label>
            <textarea id="description" name="description" class="form-input" placeholder="Digite uma descrição" required>{{ old('description') }}</textarea>
        </div>

        <div class="form-group">
            <label for="preco">Preço</label>
            <input type="text" id="price" name="price" placeholder="Digite o preço" required>
        </div>  

        <div class="form-group">
            <label for="stock">Estoque</label>
            <input type="text" name="stock"  id="stock">
        </div>

        <div class="form-group">
            <label for="image">Imagem do Produto</label>
            <input type="file" name="image" accept="image/*" id="image">
        </div>

        <button type="submit" class="botao-cadastrar">Cadastrar Produto</button>
    </form>
</section>





</main>
@endsection