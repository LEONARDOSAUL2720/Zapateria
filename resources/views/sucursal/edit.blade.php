@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Editar Sucursal</h2>
       <form action="{{ route('sucursales.update', $sucursal->id) }}" method="post" enctype="multipart/form-data" class="col-lg-7">
           @csrf 
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
               <label for="nombre_s">Nombre</label>
               <input type="text" class="form-control" id="nombre_s" name="nombre_s" value="{{$sucursal->nombre_s}}" />
           </div>
           <div class="form-group">
               <label for="direccion_s">Dirección</label>
               <textarea class="form-control" id="direccion_s" name="direccion_s">{{$sucursal->direccion_s}}</textarea>
           </div>
           <div class="form-group">
               <label for="telefono_s">Teléfono</label>
               <input type="text" class="form-control" id="telefono_s" name="telefono_s" value="{{$sucursal->telefono_s}}" />
           </div>
           <div class="form-group">
               <label for="status_s">Estado</label>
               <select class="form-control" id="status_s" name="status_s">
                   <option value="1" {{ $sucursal->status_s == 1 ? 'selected' : '' }}>Activo</option>
                   <option value="0" {{ $sucursal->status_s == 0 ? 'selected' : '' }}>Inactivo</option>
               </select>
           </div>
           <button type="submit" class="btn btn-success">Guardar Cambios</button>
       </form>
   </div>
</div>
@endsection
