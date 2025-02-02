@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Producto </h2>
       <form action="{{ route('productos.update', $producto->id
) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf <!-- Protección contra ataques ya implementado en laravel  https://www.welivesecurity.com/la-es/2015/04/21/vulnerabilidad-cross-site-request-forgery-csrf/-->
           @method('PUT')
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{$error}}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="form-group">
               <label for="nombre">nombre</label>
               <input type="text" class="form-control" id="nombre_p" name="nombre_p" value="{{$producto->nombre_p}}" />
           </div>
           <div class="form-group">
            <label for="descripcion_p">Descripción Producto</label>
            <textarea class="form-control" id="descripcion_p" name="descripcion_p">{{$producto->descripcion_p}}</textarea>
           </div>
           <div class="form-group">
            <label for="precio_p">Precio</label>
            <input type="number" step="0.01" class="form-control" id="precio_p" name="precio_p" >{{$producto->precio_p}}</textarea>
           </div>
           <div class="form-group">
            <label for="existencias_p">Existencias</label>
            <input type="number" class="form-control" id="existencias_p" name="existencias_p" >{{$producto->existencias_p}}</textarea>
           </div>
           <div class="form-group">
            <label for="estatus">Estado</label>
            <select class="form-control" id="estatus" name="estatus">
                <option value="1" {{ $producto->status == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $producto->status == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </div>
           <div class="form-group">
            <label for="sucursal_id">Sucursal</label>
            <input type="number" class="form-control" id="sucursal_id" name="sucursal_id">{{$producto->sucursal_id}}</textarea>
           </div>
           <button type="submit" class="btn btn-success">Guardar Producto</button>
       </form>
   </div>
</div>
@endsection
