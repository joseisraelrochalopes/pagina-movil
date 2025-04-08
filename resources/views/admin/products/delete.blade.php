<div>
    <table>
        <thead>
            ¿Estas seguro de eliminar este producto {{$product->name_product}}?
        </thead>
        <tbody>
            <tr>
                <td>
                    <form action="{{route('products.index')}}">
                        <button type="submit" class="btn btn-danger">
                            <i class="fa-solid fa-trash-can"></i> Cancelar 
                           </button>
                    </form>
                </td>
                <td>
                    <form action="{{route('products.destroy',$product->id)}}" method="POST">
                        @method('DELETE')
                        @csrf
                        <button type="submit" class="btn btn-success">
                            <i class="fa-solid fa-trash-can"></i> Confirmar
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
    
    
    </table> <!-- It is not the man who has too little, but the man who craves more, that is poor. - Seneca -->
</div>
