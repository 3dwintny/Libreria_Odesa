@extends('layouts.app')
@section('content')
<div class="container">
    <div class="table-responsive">
        <table class="table">
            <thead class="table-dark">
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Número de Teléfono Principal</th>
                <th>Número de Teléfono Secundario</th>
                <th>Correo</th>
                <th>Dirección</th>
            </thead>
            <tbody>
                <tr>
                    <td>{{$proveedor->nombres}}</td>
                    <td>{{$proveedor->apellidos}}</td>
                    <td>{{$proveedor->telefono1}}</td>
                    <td>{{$proveedor->telefono2}}</td>
                    <td>{{$proveedor->correo}}</td>
                    <td>{{$proveedor->direccion}}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
@endsection