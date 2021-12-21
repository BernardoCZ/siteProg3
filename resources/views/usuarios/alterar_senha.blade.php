@extends('templates.base')
@section('title', 'Alterar Senha')
@section('h1', 'Alterar Senha')

@section('content')
<div class="row">
    <div class="col-4">

    @if (session('erro'))
    
    <!-- Erro -->
    <div class="alert alert-danger" role="alert">
    {{ session('erro') }}
    </div>

    @endif

        <form method="post" action="{{ route('profile.update_senha') }}">
            @csrf
            @method('put')
            <div class="mb-3">
                <label for="password" class="form-label">Senha Atual</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>

            <div class="mb-3">
                <label for="new_password" class="form-label">Nova Senha</label>
                <input type="password" class="form-control" id="new_password" name="new_password">
            </div>

            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirmar Nova Senha</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Gravar</button>
            </div>
        </form>

    </div>
</div>
@endsection