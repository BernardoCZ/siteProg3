@extends('templates.base')
@section('title', 'Editar Perfil')
@section('h1', 'Editar Perfil')

@section('content')
<div class="row">
    <div class="col-4">

        <form method="post" action="{{ route('profile.update') }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" class="form-control" id="name" name="name" value="{{$usuario->name}}">
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" class="form-control" id="email" name="email" value="{{$usuario->email}}">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection