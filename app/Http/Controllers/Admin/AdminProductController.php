<?php

namespace App\Http\Controllers\Admin;

use App\Models\Producto;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminProductController extends Controller
{
    public function index()
    {
        $productos = Producto::paginate(10);
        return view('admin.products.index', compact('productos'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_product' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'unit_price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/products'), $filename);
            $data['image'] = $filename;
        }

        Producto::create($data);

        return redirect()->route('admin.products.index')->with('success', 'Producto registrado correctamente.');
    }

    public function show(Producto $product)
    {
        return view('admin.products.show', ['product' => $product]); // Aquí cambiamos 'producto' por 'product'
    }

    public function edit(Producto $product)
    {
        return view('admin.products.edit', ['product' => $product]); // Asegúrate de pasar 'product' correctamente
    }

    public function update(Request $request, Producto $product)
    {
        $data = $request->validate([
            'name_product' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'unit_price' => 'required|numeric',
            'brand' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            $request->image->move(public_path('img/products'), $filename);
            $data['image'] = $filename;
        }

        $product->update($data);

        return redirect()->route('admin.products.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy(Producto $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Producto eliminado correctamente.');
    }
}
