<!-- resources/views/user/productos/show.blade.php -->
@extends('layout.app')

@section('content')
    <h1>{{ $producto->name_product }}</h1>
    <p>{{ $producto->description }}</p>
    <p><strong>Precio:</strong> ${{ $producto->price }}</p>
    <p><strong>Marca:</strong> {{ $producto->brand }}</p>
    @if($producto->image)
        <img src="{{ asset('img/products/' . $producto->image) }}" alt="{{ $producto->name_product }}">
    @endif
    <a href="{{ route('productos') }}">Volver a la lista de productos</a>
@endsection
