@extends('templates.base')
@section('title', 'Visualizar imagem')

@section('content')
<h1>{{$img->titulo}}</h1>
<p>Descrição: {{ $img->descricao }}</p>
{{-- Texto alternativo para a imagem é o título dela. --}}
<img src="{{asset('img/' . $img->arquivo)}}" class="img-thumbnail mb-5" alt="{{$img->titulo}}">
@endsection