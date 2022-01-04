@extends('templates.base')
@section('title', 'Recortar Imagem')
@section('h1', 'Recortar Imagem')

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" integrity="sha512-0SPWAwpC/17yYyZ/4HSllgaK7/gg9OlVozq8K7rf3J8LvCjYEEIfzzpnA2/SSjpGIunCSD18r3UhvDcu/xncWA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js" integrity="sha512-ooSWpxJsiXe6t4+PPjCgYmVfr1NS5QXJACcR/FPpsdm6kqG1FmQ2SVyg2RXeVuCRBLr0lWHnWJP6Zs1Efvxzww==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{asset('js/recorte.js')}}"></script>
@endpush

@section('content')
<div>
    <img id="img-crop" src="{{asset('img/' . $prod->imagem)}}">
</div>
<form action="{{route('produtos.cut', $prod)}}" method="post" id="cortar">
    @csrf
    <input type="hidden" name="img" id="img">
    <p>
        <input type="submit" value="Cortar" class="btn btn-primary">
    </p>
</form>
@endsection
