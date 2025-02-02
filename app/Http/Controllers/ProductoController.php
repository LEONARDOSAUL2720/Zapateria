<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Productos;
use Illuminate\Support\Facades\Log;

class ProductoController extends Controller
{

    public function index()
    {
        $productos = Productos::where('estatus', 1)->get();
        return view('producto.index', ['productos' => $this->cargarDT($productos)]);
    }

    private function cargarDT($consulta)
    {
        $productos = [];
        foreach ($consulta as $key => $value) {
            $actualizar = route('productos.edit', $value['id']);
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

            $productos[$key] = array(
                $acciones,
                $value['id'],
                $value['nombre_p'],
                $value['descripcion_p'],
                $value['precio_p'],
                $value['existencias_p'],
                $value['estatus'],
                $value['sucursal_id'],
            );
        }
        return $productos;
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
        //Abre el formulario que permita editar un registro
        $productos = Productos::findOrFail($id);
        return view('producto.edit', array(
            'producto' => $productos
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Valida la información del formulario de edición
        $this->validate($request, [
            'nombre_p' => 'nullable|min:5',
            'descripcion_p' => 'nullable',
            'precio_p' => 'nullable|numeric',
            'existencias_p' => 'nullable|integer',
            'estatus' => 'nullable|numeric',
            'sucursal_id' => 'nullable|exists:Sucursales_id' // Verifica que la sucursal exista
        ]);

        $producto = Productos::findOrFail($id);

        // Actualiza solo los campos que tienen valores en el formulario
        if ($request->has('nombre_p') && $request->input('nombre_p') !== null) {
            $producto->nombre_p = $request->input('nombre_p');
        }
        if ($request->has('descripcion_p') && $request->input('descripcion_p') !== null) {
            $producto->descripcion_p = $request->input('descripcion_p');
        }
        if ($request->has('precio_p') && $request->input('precio_p') !== null) {
            $producto->precio_p = $request->input('precio_p');
        }
        if ($request->has('existencias_p') && $request->input('existencias_p') !== null) {
            $producto->existencias_p = $request->input('existencias_p');
        }
        if ($request->has('estatus') && $request->input('estatus') !== null) {
            $producto->estatus = $request->input('estatus');
        }
        if ($request->has('sucursal_id') && $request->input('sucursal_id') !== null) {
            $producto->sucursal_id = $request->input('sucursal_id');
        }
        $producto->save();
        return redirect()->route('productos.index')->with([
            'message' => 'El producto se ha actualizado correctamente'
        ]);
    }


    public function deleteProducto(string $producto_id)
    {

        $producto = Productos::find($producto_id);
        if ($producto) {

            $producto->estatus = 0;
            $producto->update();

            // Enviar detalles adicionales al navegador
            return redirect()->route('productos.index')->with([
                'message' => 'El producto se ha eliminado correctamente',
                'deleted_producto' => $producto->toArray() // Información del producto eliminado
            ]);
        } else {
            return redirect()->route('productoss.index')->with([
                'message' => 'El producto que trata de eliminar no existe',
                'producto_id' => $producto_id // ID enviado pero no encontrado
            ]);
        }
    }
}
