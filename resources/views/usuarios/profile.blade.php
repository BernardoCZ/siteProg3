@extends('templates.base')
@section('title', 'Perfil')
@section('h1', 'Informações de perfil')

@section('content')
<div class="row">
    <div class="col">
        {{ dd(Auth::User()) }}
    </div>
</div>
@endsection