<?php

namespace App\Http\Controllers;

use App\Models\Sucursales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class SucursalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('sucursal.create');
    }
    public function store(Request $request)
    {
        // Validación de los datos del formulario
        $this->validate($request, [
            'nombre_s' => 'required|min:3|max:100',
            'direccion_s' => 'required|max:150',
            'telefono_s' => 'required|max:10',
        ]);
        // Crear y guardar la sucursal
        $sucursal = new Sucursales();
        $sucursal->nombre_s = $request->input('nombre_s');
        $sucursal->direccion_s = $request->input('direccion_s');
        $sucursal->telefono_s = $request->input('telefono_s');
        $sucursal->status_s = 1; // Activa por defecto
        $sucursal->save();
        // Redirigir con un mensaje de éxito
        return redirect()->route('sucursales.create')->with('message', 'La sucursal se ha guardado correctamente.');
    
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
