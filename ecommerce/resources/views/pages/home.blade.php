@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('title', 'Beiçada no Pastel')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endpush

@section('content')

    <!-- Meta CSRF para AJAX -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <header class="fixed-menu">
        <nav>
            <ul>
                <li><a href="{{ route('login') }}">Entrar</a></li>
                <li><a href="#delivery">Delivery</a></li>
                <li><a href="#app">App</a></li>
                <li><a href="#perfil">Perfil</a></li>
            </ul>
        </nav>
    </header>

    <main>
        <h2>Cardápio Digital</h2>

        <section class="container-salgado">
            <div class="container-salgado-titulo">
                <h3>Opções de Pastel Salgado</h3>
            </div>
            <div class="container-salgado-produtos">
                @foreach($salgados as $product)
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <h4>{{ $product->name }}</h4>
                        <p class="description">{{ $product->description }}</p>
                        <p class="price">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        <button onclick="addToCart({{ $product->id }})">Adicionar</button>
                    </div>
                @endforeach
            </div>
        </section>

        <section class="container-doce">
            <div class="container-doce-titulo">
                <h3>Opções de Pastel Doce</h3>
            </div>
            <div class="container-doce-produtos">
                @foreach($doces as $product)
                    <div class="container-produto">
                        <div class="container-foto">
                            <img src="{{ asset('storage/products/'.$product->image) }}" alt="{{ $product->name }}">
                        </div>
                        <h4>{{ $product->name }}</h4>
                        <p class="description">{{ $product->description }}</p>
                        <p class="price">R$ {{ number_format($product->price, 2, ',', '.') }}</p>
                        <button onclick="addToCart({{ $product->id }})">Adicionar</button>
                    </div>
                @endforeach
            </div>
        </section>
    </main>

   <script>
        function addToCart(productId) {
            fetch('{{ route("cart.add") }}', {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ product_id: productId, quantity: 1 })
            })
            .then(response => response.json())
            .then(data => {
                alert('Produto adicionado ao carrinho!');
                // Aqui você pode atualizar o ícone ou número de itens do carrinho
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Erro ao adicionar ao carrinho');
            });
        }
    </script>

@endsection
