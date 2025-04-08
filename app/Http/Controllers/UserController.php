<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Tipo;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Página principal de usuarios registrados
    public function home()
    {
        return view('home'); // Carga la vista de inicio para usuarios registrados
    }

    // Muestra todos los productos
    public function productos()
    {
        $productos = Producto::all(); // Obtiene todos los productos
        return view('user.productos.index', compact('productos')); // Asegúrate de tener la vista correcta
    }

    // Muestra los detalles de un producto
    public function productoShow($id)
    {
        $producto = Producto::findOrFail($id); // Encuentra el producto por ID
        return view('user.productos.show', compact('producto')); // Vista de detalle del producto
    }

    // Muestra los productos populares
    public function productosPopulares()
    {
        $productosPopulares = Producto::where('popular', true)->get(); // Filtra los productos populares
        return view('user.productos.populares', compact('productosPopulares')); // Vista de productos populares
    }

    // Muestra los tipos de productos
    public function tipos()
    {
        $tipos = Tipo::all(); // Obtiene todos los tipos
        return view('user.productos.tipos', compact('tipos')); // Vista de tipos de productos
    }

    // Muestra la vista de contactar
    public function contactar()
    {
        return view('user.productos.contactar'); // Vista de contacto
    }
}
