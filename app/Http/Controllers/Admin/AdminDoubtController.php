<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminDoubtController extends Controller
{
    /**
     * Muestra la lista de dudas.
     */
    public function index()
    {
        // Aquí puedes cargar las dudas desde el modelo si lo tienes.
        // Por ahora, retornamos una vista de ejemplo.
        return view('admin.doubts.index');
    }

    /**
     * Muestra una duda específica (si estás usando rutas con {id})
     */
    public function show($id)
    {
        // Aquí puedes buscar una duda por ID si lo deseas.
        return view('admin.doubts.show', compact('id'));
    }
}
