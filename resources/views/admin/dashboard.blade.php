@extends('admin.layout')

@section('content')
<div class="container text-center mt-5">
    <h1 class="mb-4">Panel de Administración</h1>
    
    <div class="row justify-content-center">
        <div class="col-md-5">
            <a href="{{ route('admin.guys.index') }}" class="btn btn-primary btn-lg w-100 mb-3">Tipos y Modelos</a>
        </div>
        <div class="col-md-5">
            <a href="{{ route('admin.popular.index') }}" class="btn btn-primary btn-lg w-100 mb-3">Teléfonos del Momento</a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-5">
            <a href="{{ route('admin.doubts.index') }}" class="btn btn-secondary btn-lg w-100 mb-3">Dudas</a>
        </div>
        <div class="col-md-5">
            <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-lg w-100 mb-3">Inventario</a>
        </div>
    </div>

    <div class="mt-5">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="btn btn-danger btn-lg">Cerrar sesión</button>
        </form>
    </div>
</div>
@endsection
