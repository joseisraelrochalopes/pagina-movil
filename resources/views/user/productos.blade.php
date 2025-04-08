@extends('layout.main')

@section('section_Main')
    <h1>Lista de Productos</h1>
    
    @if($productos->isEmpty())
        <p>No hay productos disponibles en este momento.</p>
    @else
        @foreach ($productos as $producto)
            <div class="producto">
                <h3>{{ $producto->nombre }}</h3>
                <p>{{ $producto->descripcion }}</p>
                <!-- Si quieres más detalles, puedes agregar más campos aquí -->
            </div>
        @endforeach
    @endif
@endsection
