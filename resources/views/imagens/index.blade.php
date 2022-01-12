@extends('templates.base')
@section('title', 'Galeria')
@section('h1', 'Galeria de Imagens')

@section('content')
<div class="row mb-5">
    <div class="col">
        <p>Aqui você poderá ver todas as imagens cadastradas</p>
        <a class="btn btn-primary" href="{{route('galeria.inserir')}}" role="button">Inserir imagem</a>
    </div>
</div>

<div class="row">
    @foreach($imgs as $img)
    {{-- Estilização para adequar o tamanho das colunas --}}
    <div class="col" style="min-width:250px; max-width: 300px;">
        {{-- Estilização para configurar a formatação do card --}}
        <div class="card" style="display:flex;">
        {{-- Texto alternativo para a imagem é o título dela. Estilização para impedir altura muito grande da imagem--}}
            <img src="{{asset('img/' . $img->arquivo)}}" class="card-img-top" alt="{{$img->titulo}}" style="max-height: 400px;">
            <div class="card-body">
                <h5 class="card-title">{{$img->titulo}}</h5>
                <p class="card-text">{{$img->descricao}}</p>
                <a href="{{route('galeria.show', $img)}}" class="btn btn-primary">Ver Imagem</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection