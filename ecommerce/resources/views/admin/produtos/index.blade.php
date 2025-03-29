@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/reset.css">
<link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/admin.css">
<link rel="stylesheet" href="/Bei-ada-Pastelaria-main/public/css/form.css">
<main>
    <section class="container-admin-banner">
        <a href="/Bei-ada-Pastelaria-main/front-end/public/index.php"><img src="{{ asset('') }}" class="logo-admin" alt="logo-beicada"></a> 
        <h1>Administração Beiçada</h1>
        <img class="ornaments" src="{{ asset('') }}" alt="ornaments">
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
                        <td><a class="botao-editar" href="edit.blade.php">Editar</a></td>
                        <td>
                            <form action="{{ route('produtos.destroy', $produto->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="botao-excluir" onclick="return confirm('Tem certeza que deseja excluir este produto?')">Excluir</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        
        <a class="botao-cadastrar" href="create.blade.php">Cadastrar produto</a>
        
        @if(isset($produtos) && count($produtos) > 0)
            <form action="{{ route('produtos.pdf') }}" method="POST">
                @csrf
                <button type="submit" class="botao-relatorio">Baixar Relatório</button>
            </form>
        @endif

    </section> 
</main>
@endsection
