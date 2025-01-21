@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Crear un Producto</h2>
   </div>
   <div class="row">
       <form action="{{ route('productos.store') }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf
           @if($errors->any())
               <div class="alert alert-danger">
                   <ul>
                       @foreach($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ul>
               </div>
           @endif
           <div class="form-group">
               <label for="nombre_p">Nombre Producto</label>
               <input type="text" class="form-control" id="nombre_p" name="nombre_p" value="{{ old('nombre_p') }}" />
           </div>
           <div class="form-group">
               <label for="descripcion_p">Descripción Producto</label>
               <textarea class="form-control" id="descripcion_p" name="descripcion_p">{{ old('descripcion_p') }}</textarea>
           </div>
           <div class="form-group">
               <label for="precio_p">Precio</label>
               <input type="number" step="0.01" class="form-control" id="precio_p" name="precio_p" value="{{ old('precio_p') }}" />
           </div>
           <div class="form-group">
               <label for="existencias_p">Existencias</label>
               <input type="number" class="form-control" id="existencias_p" name="existencias_p" value="{{ old('existencias_p') }}" />
           </div>
           <div class="form-group">
               <label for="sucursal_id">Sucursal</label>
               <input type="number" class="form-control" id="sucursal_id" name="sucursal_id" value="{{ old('sucursal_id') }}" />
           </div>
           <button type="submit" class="btn btn-success">Guardar Producto</button>
       </form>
   </div>
</div>
@endsection
