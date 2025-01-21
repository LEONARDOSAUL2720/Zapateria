<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('producto.create');
    }

    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $this->validate($request, [
            'nombre_p' => 'required|min:5',
            'descripcion_p' => 'required',
            'precio_p' => 'required|numeric',
            'existencias_p' => 'required|integer',
            'sucursal_id' => 'required|exists:Sucursales,id', // Verifica que la sucursal exista
        ]);
        // Crear y guardar el producto
        $producto = new Productos();
        $producto->nombre_p = $request->input('nombre_p');
        $producto->descripcion_p = $request->input('descripcion_p');
        $producto->precio_p = $request->input('precio_p');
        $producto->existencias_p = $request->input('existencias_p');
        $producto->sucursal_id = $request->input('sucursal_id');
        $producto->estatus = 1; // Estatus activo por defecto
        $producto->save();

        // Redirigir al listado con un mensaje de éxito
        return redirect()->route('productos.create')->with('message', 'El Producto se ha guardado correctamente.');
            
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
