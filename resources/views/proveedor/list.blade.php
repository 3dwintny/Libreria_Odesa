@extends('layouts.app')
@section('content')
<div class="container">
    <div class="table-responsive">
    <h1>Proveedores</h1>
    <table class="table table-striped table-hover">
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
    @endsection
    <script>
        function eliminarProveedor(value){
            action = confirm(value) ? true : event.preventDefault();
        }
    </script>