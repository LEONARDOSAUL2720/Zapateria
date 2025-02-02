<table>
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nombre Prodcuto</th>
        <th scope="col">Descripccion</th>
        <th scope="col">Precio</th>
        <th scope="col">Existencias</th>
        <th scope="col">Estatus</th>
      </tr>
    </thead>
    <tbody>
        @foreach($productos as $key => $producto)
            <tr>
                <td>{{$producto->id}}</td>
                <td>{{$producto->nombre_p}}</td>
                <td>{{$producto->descripcion_p}}</td>
                <td>{{$producto->precio_p}}</td>
                <td>{{$producto->existencias_p}}</td>
                <td>{{$producto->estatus}}</td>
            </tr>
        @endforeach
    </tbody>
  </table>
 