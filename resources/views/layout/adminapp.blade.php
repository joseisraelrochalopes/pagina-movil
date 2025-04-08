
<h1 class="display-3">Catálogo de productos</h1>


<table class="table">
    <thead>
        <tr>
            <th>Nombre del producto</th>
            <th>Marca</th>
            <th>Cantidad</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Acciones</th>
            <th>Fecha</th>
        </tr>
    </thead>     
    <tbody>
        @foreach ($productos as $p)
        <tr>
            <td>{{ $p->name_product }}</td>
            <td>{{ $p->brand }}</td>
            <td>{{ $p->stock }}</td>
            <td>{{ $p->unit_price }}</td>
            <td>
                @if ($p->image)
                    <img src="{{ asset('img/products/' . $p->image) }}" width="80" alt="products">
                @else
                    <span>Sin imagen</span>
                @endif
            </td>
            <td>
                <a href="{{ route('admin.products.edit', $p) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('admin.products.destroy', $p) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
            <td>{{ $p->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

