@extends('admin.layout') {{-- o 'layouts.admin' según estés usando --}}

@section('content')
<div class="container mt-4">
    <a href="{{ route('admin.dashboard') }}" class="btn btn-primary mb-3">regresar al panel de administrador</a>

    <h2>Productos registrados</h2>

    @if ($productos->isEmpty())
        <p>No hay productos disponibles.</p>
    @else
        <div class="row">
            @foreach ($productos as $producto)
                <div class="col-md-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->name_product }}</h5>
                            <p class="card-text">{{ $producto->description }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>
@endsection
