@extends('templates.base')
@section('title', 'Inserir Produto')
@section('h1', 'Inserir Produto')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('produtos.gravar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>

            <div class="mb-3">
                <label for="preco" class="form-label">Preço</label>
                <input type="number" class="form-control" id="preco" name="preco">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>

            <div class="mb-3">
                <label for="imagem" class="form-label">Foto</label>
                <input class="form-control" type="file" id="imagem" name="imagem">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection