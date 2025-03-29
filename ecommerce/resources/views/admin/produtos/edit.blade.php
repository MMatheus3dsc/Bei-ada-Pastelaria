@extends('layouts.app')

@section('content')
<main>
    <section class="container-admin-banner">
        <a href="{{ route('produtos.index') }}"><img src="{{ asset('img/banner-beiçada.jpg') }}" class="logo-admin" alt="logo-beicada"></a>
        <h1>Editar Produto</h1>
        <img class="ornaments" src="{{ asset('img/ornaments-coffee.png') }}" alt="ornaments">
    </section>

    <section class="container-form">
        <form method="POST" action="{{ route('produtos.update', $produto->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" class="form-input" 
                       placeholder="Digite o nome do produto" 
                       value="{{ old('nome', $produto->nome) }}" required>
                @error('nome')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="container-radio">
                <div class="radio-option">
                    <label for="salgado">Salgado</label>
                    <input type="radio" id="salgado" name="tipo" value="Salgado" 
                           {{ old('tipo', $produto->tipo) == 'Salgado' ? 'checked' : '' }}>
                </div>
                <div class="radio-option">
                    <label for="doce">Doce</label>
                    <input type="radio" id="doce" name="tipo" value="Doce" 
                           {{ old('tipo', $produto->tipo) == 'Doce' ? 'checked' : '' }}>
                </div>
                @error('tipo')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea id="descricao" name="descricao" class="form-input" 
                          placeholder="Digite uma descrição" required>{{ old('descricao', $produto->descricao) }}</textarea>
                @error('descricao')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="preco">Preço</label>
                <input type="text" id="preco" name="preco" class="form-input" 
                       placeholder="Digite o preço" 
                       value="{{ old('preco', number_format($produto->preco, 2)) }}" required>
                @error('preco')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="imagem">Imagem do Produto</label>
                @if($produto->imagem)
                    <div class="current-image">
                        <img src="{{ asset('storage/produtos/'.$produto->imagem) }}" alt="Imagem atual" style="max-width: 200px; display: block; margin: 10px 0;">
                        <span>Imagem atual</span>
                    </div>
                @endif
                <input type="file" name="imagem" accept="image/*" id="imagem" class="form-input-file">
                @error('imagem')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="botao-editar">Atualizar Produto</button>
        </form>
    </section>
</main>
@endsection
@push('styles')
<style>
    .container-form {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 16px;
    }

    textarea.form-input {
        min-height: 100px;
        resize: vertical;
    }

    .container-radio {
        display: flex;
        gap: 20px;
        margin: 15px 0;
    }

    .radio-option {
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .botao-editar {
        background-color: #FFC107;
        color: #000;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s;
    }

    .botao-editar:hover {
        background-color: #E0A800;
    }

    .error-message {
        color: #f44336;
        font-size: 14px;
        margin-top: 5px;
        display: block;
    }

    .current-image {
        margin-bottom: 15px;
    }
</style>
@endpush