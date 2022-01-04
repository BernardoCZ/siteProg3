@extends('templates.base')
@section('title', 'Produtos')
@section('h1', 'Página de Produtos')

@section('content')
<div class="row">
    <div class="col">
        <p>Sejam bem-vindos à página de produtos</p>
        <a class="btn btn-primary" href="{{route('produtos.inserir')}}" role="button">Cadastrar produto</a>
    </div>
</div>

<div class="row">
    <table class="table">
        <tr>
            <th>ID</th>
            <th width="50%">Nome</th>
            <th>Preço</th>
            <th>Gerenciar</th>
        </tr>

        @foreach($prods as $prod)
        <tr>
            <td>{{$prod->id}}</td>
            <td>
                <a href="{{ route('produtos.show', $prod) }}">{{$prod->nome}}</a>
            </td>
            <td>R$ {{$prod->preco}}</td>
            <td>
                @if (Auth::user()->admin == true)
                    <a href="{{ route('produtos.edit', $prod) }}" class="btn btn-primary btn-sm" role="button"><i class="bi bi-pencil-square"></i> Editar</a>
                    <a href="{{ route('produtos.recorte', $prod) }}" class="btn btn-info btn-sm text-white" role="button"><i class="bi bi-scissors"></i> Recortar Imagem</a>
                @endif
                <a href="{{ route('produtos.remove', $prod) }}" class="btn btn-danger btn-sm" role="button"><i class="bi bi-trash"></i> Apagar</a>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection
