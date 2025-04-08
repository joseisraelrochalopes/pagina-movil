<!-- resources/views/user/productos/index.blade.php -->
@extends('layout.app')

@section('content')
    <h1>Lista de Productos</h1>

    @foreach ($productos as $producto)
        <div class="producto">
            <h3>{{ $producto->name_product }}</h3>
            <p>{{ $producto->description }}</p>
            <a href="{{ route('producto.show', $producto->id) }}">Ver detalles</a>
        </div>
    @endforeach
@endsection
