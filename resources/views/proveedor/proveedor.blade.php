@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div class="p-2" style="">
            <a href="{{route('proveedores.index')}}" style="text-decoration: none; font-weight:bolder;">Listado de Proveedores</a>
        </div>
    </div>

    <h1>Resultado de la Búsqueda</h1>
</div>

<div class="container" style="background-color: #EFEFEF; border-radius:20px;">   
    <div class="d-flex flex-row mb-3">
        <div class="p-2" style="font-weight: bolder;">BÚSQUEDA</div>
    </div>

    <form method="POST" action="{{route('buscarProveedores')}}">
        @csrf
        <center>
            <div class="row g-3">
                <div class="form-floating col">
                    <input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre(s)">
                    <label for="floatingInput">Nombre(s)</label>
                </div>
                <div class="form-floating col">
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellido(s)">
                    <label>Apellido(s)</label>
                    
                </div><input type="submit" onclick="window.location='{{ route('buscarProveedores') }}'" value="Buscar" 
                style="background-color: #77C9D4; color:#328CC1; font-weight:bolder; border:0px; 
                border-radius:5px;width:5em; height:15%; margin-top:2.5em;">
                </div>
        </center>
    </form>
    </div>
    <br>
<div class="container">
    <div class="table-responsive">
    <table class="table table-hover">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Teléfono Principal</th>
                <th>Correo Electrónico</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($proveedores as $item)
            <tr>
                <td>{{$item->id}}</td>
                <td>{{$item->nombres}}</td>
                <td>{{$item->apellidos}}</td>
                <td>{{$item->telefono1}}</td>
                <td>{{$item->correo}}</td>
                <td>
                    <form action="{{route('proveedores.destroy',$item->id)}}" method="POST">
                        <a href="{{route('proveedores.show',$item->id)}}" style="text-decoration: none; font-weight:bolder; color:#328CC1;">Ver</a>
                        <a href="{{route('proveedores.edit',$item->id)}}" style="text-decoration: none; font-weight:bolder; color:#328CC1;">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn" onclick="return eliminarProveedor('Eliminar Proveedor')" style="background-color:#328CC1; color:#FFFFFF; font-weight:bolder;">Eliminar</button>
                    </form>
                </td>
            </tr>    
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script>
    function eliminarProveedor(value){
        action = confirm(value) ? true : event.preventDefault();
    }
</script>
    @endsection
    