@extends('layouts.app')

@section('title', 'Administração de Produtos')

@push('styles')
    <!-- Use a função asset() para gerar URLs corretas -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
@endpush

@section('content')
<main>
    <section class="container-admin-banner">
    <img src="{{ asset('img/banner-beiçada.jpg') }}" class="logo-admin" alt="logo-beicada">
        <h1>Administração</h1>
        <img class="ornaments" src="{{ asset('img/ornaments-coffee.png') }}" alt="ornaments">
    </section>

    <h2>Lista de Produtos</h2>

    <section class="container-table">
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Preço</th>
                    <th>Estoque</th>
                    <th colspan="2">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->type_name }}</td>
                        <td>{{ Str::limit($product->description, 50) }}</td>
                        <td>{{ $product->formatted_price }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>
                            <a class="botao-editar" href="{{ route('admin.products.edit', $product->id) }}">
                                Editar
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="botao-excluir" 
                                        onclick="return confirm('Tem certeza que deseja excluir este produto?')">
                                    Excluir
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a class="botao-cadastrar" href="{{ route('admin.products.create') }}">
            Cadastrar produto
        </a>
    </section> 
</main>
@endsection


