@extends('layouts.app')

@push('styles')
    <!-- Use a função asset() para gerar URLs corretas -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush
@section('content')
<main>
    <section class="container-admin-banner">
        <a href="{{ route('admin.products.index') }}"><img src="{{ asset('img/banner-beiçada.jpg') }}" class="logo-admin" alt="logo-beicada"></a>
        <h1>Editar Produto</h1>
        <img class="ornaments" src="{{ asset('img/ornaments-coffee.png') }}" alt="ornaments">
    </section>

    <section class="container-form">
        <form method="POST" action="{{ route('admin.products.update', $product->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" class="form-input" 
                       placeholder="Digite o nome do produto" 
                       value="{{ old('name', $product->name) }}" required>
                @error('name')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
            <label>Tipo:</label>
            <div class="container-radio">
            <label class="radio-option">
                <input type="radio" name="type" value="salgado" {{ old('type', $product->type_name) == 'Salgado' ? 'checked' : '' }} required>
                Salgado
            </label>
            
            <label class="radio-option">
                <input type="radio" name="type" value="doce" {{old('type', $product->type_name) == 'Doce' ? 'checked' : ''}}>
                Doce
            </label>
            </div>
             @error('type')
                    <span class="error-message">{{ $message }}</span>
                @enderror
         </div>


            <div class="form-group">
                <label for="description">Descrição</label>
                <textarea id="description" name="description" class="form-input" 
                          placeholder="Digite uma descrição" required>{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label for="price">Preço</label>
                <input type="text" id="price" name="price" class="form-input" 
                       placeholder="Digite o preço" 
                       value="{{ old('price', number_format($product->price, 2)) }}" required>
                @error('price')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div> 

            <div class="form-group">
             <label for="stock">Estoque</label>
             <input type="text" name="stock"  id="stock" placeholder="Tem quantos?" value="{{ old('stock', $product->stock) }}" required >
             @error('stock')
                    <span class="error-message">{{ $message }}</span>
                @enderror
          </div>


            <div class="form-group">
                <label for="image">Imagem do Produto</label>
                @if($product->image)
                    <div class="current-image">
                        <img src="{{ asset('storage/products/'.$product->image) }}" alt="Imagem atual" style="max-width: 200px; display: block; margin: 10px 0;">
                        <span>Imagem atual</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*" id="image" class="form-input-file">
                @error('image')
                    <span class="error-message">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="botao-editar">Atualizar Produto</button>
        </form>
    </section>
</main>
@endsection
