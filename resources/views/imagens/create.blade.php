@extends('templates.base')
@section('title', 'Inserir Imagem')
@section('h1', 'Inserir Imagem')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('galeria.gravar') }}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="imagem" class="form-label">Imagem</label>
                <input class="form-control" type="file" id="imagem" name="imagem">
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>

            <div class="mb-3">
                <label for="descricao" class="form-label">Descrição</label>
                <textarea class="form-control" id="descricao" name="descricao" rows="3"></textarea>
            </div>

            
            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection