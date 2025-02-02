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
        $sucursales = Sucursales::where('status_s', 1)->get();
        return view('sucursal.index', ['sucursales' => $this->cargarDT($sucursales)]);
    }

    private function cargarDT($consulta)
    {
        $sucursales = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('sucursales.edit', $value['id']);
            $acciones = '
           <div class="btn-acciones">
               <div class="btn-circle">
                   <a href="' . $actualizar . '" role="button" class="btn btn-success" title="Actualizar">
                       <i class="far fa-edit"></i>
                   </a>
                   <a role="button" class="btn btn-danger" onclick="modal(' . $value['id'] . ')" data-bs-toggle="modal" data-bs-target="#exampleModal">
    <i class="far fa-trash-alt"></i>
</a>
               </div>
           </div>';

            $sucursales[$key] = array(
                $acciones,
                $value['id'],
                $value['nombre_s'],
                $value['direccion_s'],
                $value['telefono_s'],
                $value['status_s'],
                
            );
        }
        return $sucursales;
    }


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
        //Abre el formulario que permita editar un registro
        $sucursales = Sucursales::findOrFail($id);
        return view('sucursal.edit', array(
            'sucursal'=>$sucursales
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
      // Valida la información del formulario de edición
      $this->validate($request, [
        'nombre_s' => 'nullable',
        'direccion_s' => 'nullable',
        'telefono_s' => 'nullable|numeric',
        'status_s' => 'nullable|numeric',
    ]);

    $sucursal = Sucursales::findOrFail($id);

    // Actualiza solo los campos que tienen valores en el formulario
    if ($request->has('nombre_s') && $request->input('nombre_s') !== null) {
        $sucursal->nombre_s = $request->input('nombre_s');
    }
    if ($request->has('direccion_s') && $request->input('direccion_s') !== null) {
        $sucursal->direccion_s = $request->input('direccion_s');
    }
    if ($request->has('telefono_s') && $request->input('telefono_s') !== null) {
        $sucursal->telefono_s = $request->input('telefono_s');
    }
    if ($request->has('status_s') && $request->input('status_s') !== null) {
        $sucursal->status_s = $request->input('status_s');
    }
    $sucursal->save();
    return redirect()->route('sucursales.index')->with([
        'message' => 'La sucursal se ha actualizado correctamente'
    ]);
    }

    public function deleteSucursal(string $sucursal_id)
    {
       
        $sucursal = Sucursales::find($sucursal_id);
        if ($sucursal) {
            
            $sucursal->status_s = 0;
            $sucursal->update();
            
            // Enviar detalles adicionales al navegador
            return redirect()->route('sucursales.index')->with([
                'message' => 'La sucursal se ha eliminado correctamente',
                'deleted_sucursal' => $sucursal->toArray() // Información del producto eliminado
            ]);
        } else {
            return redirect()->route('sucursales.index')->with([
                'message' => 'La sucursal que trata de eliminar no existe',
                'sucursal_id' => $sucursal_id // ID enviado pero no encontrado
            ]);
        }
    }
}
