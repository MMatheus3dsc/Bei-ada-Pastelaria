@extends('layouts.app')

@section('content')
<main>
    <section class="container-admin-banner">
        <a href="{{ route('admin.produtos') }}"><img src="{{ asset('img/banner-beiçada.jpg') }}" class="logo-admin" alt="logo-beicada"></a> 
        <h1>Administração Beiçada</h1>
        <img class="ornaments" src="{{ asset('img/ornaments-coffee.png') }}" alt="ornaments">
    </section>

    <h2>Lista de Produtos</h2>

    <section class="container-table">
        <table>
            <thead>
                <tr>
                    <th>Produto</th>
                    <th>Tipo</th>
                    <th>Descrição</th>
                    <th>Valor</th>
                    <th colspan="2">Ação</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produtos as $produto)
                    <tr>
                        <td>{{ $produto->nome }}</td>
                        <td>{{ $produto->tipo }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->preco_formatado }}</td>
                        <td><a class="botao-editar" href="{{ route('admin.produtos.edit', $produto->id) }}">Editar</a></td>
                        <td>
                            <form action="{{ route('admin.produtos.destroy', $produto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="botao-excluir">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a class="botao-cadastrar" href="{{ route('admin.produtos.create') }}">Cadastrar produto</a>
        <form action="{{ route('admin.produtos.pdf') }}" method="POST">
            @csrf
            <button type="submit" class="botao-cadastrar">Baixar Relatório</button>
        </form>
        <a class="botao-sair" href="{{ route('logout') }}">Logout</a>
    </section>
</main>
@endsection
