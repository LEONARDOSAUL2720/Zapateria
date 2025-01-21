@extends('adminlte::page')
@section('content')
<div class="container">
   <div class="row">
       <h2>Crear una Sucursal</h2>
   </div>
   <div class="row">
       <form action="{{ route('sucursales.store') }}" method="post" class="col-lg-7">
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
               <label for="nombre_s">Nombre Sucursal</label>
               <input type="text" class="form-control" id="nombre_s" name="nombre_s" value="{{ old('nombre_s') }}" />
           </div>
           <div class="form-group">
               <label for="direccion_s">Dirección</label>
               <textarea class="form-control" id="direccion_s" name="direccion_s">{{ old('direccion_s') }}</textarea>
           </div>
           <div class="form-group">
               <label for="telefono_s">Teléfono</label>
               <input type="tel" class="form-control" id="telefono_s" name="telefono_s" value="{{ old('telefono_s') }}" />
           </div>
           <button type="submit" class="btn btn-success">Guardar Sucursal</button>
       </form>
   </div>
</div>
@endsection
