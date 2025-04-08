<?php

// app/Http/Controllers/Admin/AdminGuyController.php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto; // asegúrate de importar el modelo
use Illuminate\Http\Request;

class AdminGuyController extends Controller
{
    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos
        return view('admin.guys.index', compact('productos'));
    }

    public function show($id)
    {
        return view('admin.guys.show', compact('id'));
    }
}
