@extends('layout.app')

@section('content')
<h1 class="display-3">Actualizar Producto: {{$product->name_product}}</h1>

<form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PATCH')

    <div class="form-group">
        <label for="name_product">Nombre del producto</label>
        <input type="text" class="form-control @error('name_product') is-invalid @enderror" name="name_product" value="{{ old('name_product', $product->name_product) }}" required>
        @error('name_product')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="stock">Cantidad</label>
        <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product->stock) }}" required>
        @error('stock')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="unit_price">Precio Unitario</label>
        <input type="text" class="form-control @error('unit_price') is-invalid @enderror" name="unit_price" value="{{ old('unit_price', $product->unit_price) }}" required>
        @error('unit_price')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <div class="form-group">
        <label for="image">Imagen</label>
        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image">
        @error('image')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-success">Actualizar Producto</button>
</form>
@endsection
