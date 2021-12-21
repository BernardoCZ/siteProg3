@extends('templates.base')
@section('title', 'Perfil')
@section('h1', 'Informações de perfil')

@section('content')
  <div class="d-flex align-items-center p-3 my-3 rounded shadow-sm">
    <img class="me-3" src="/docs/5.1/assets/brand/bootstrap-logo-white.svg" alt="" width="48" height="38">
    <div class="lh-1">
      <h1 class="h6 mb-0 lh-1">{{ Auth::User()->username }}</h1>
      @if (Auth::User()->admin)
      <small>Administrador</small>
      @else
      <small>Usuário Comum</small>
      @endif
    </div>
  </div>

  <div class="my-3 p-3 bg-body rounded shadow-sm">
    <h6 class="border-bottom pb-2 mb-0">Dados do Usuário</h6>

    <div class="d-flex text-muted pt-3 border-bottom">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#007bff"></rect><text x="50%" y="50%" fill="#007bff" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark">Nome</strong>
        {{ Auth::User()->name }}
      </p>
    </div>

    <div class="d-flex text-muted pt-3 border-bottom">
      <svg class="bd-placeholder-img flex-shrink-0 me-2 rounded" width="32" height="32" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 32x32" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#e83e8c"></rect><text x="50%" y="50%" fill="#e83e8c" dy=".3em">32x32</text></svg>

      <p class="pb-3 mb-0 small lh-sm">
        <strong class="d-block text-gray-dark">E-mail</strong>
        {{ Auth::User()->email }}
      </p>
    </div>
    <small class="d-block mt-3 text-end">
      <a href="{{ route('profile.edit') }}" class="btn btn-primary">Editar Perfil</a>
      <a href="{{ route('profile.senha') }}" class="btn btn-info text-white">Alterar Senha</a>
    </small>
  </div>
@endsection