@extends('layouts.app')
@section('content')
<div class="container">
    <div class="table-responsive">
    <h1>Compras</h1>
    <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                <th>No.</th>
                <th>Proveedor</th>
                <th>Fecha de Compra</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($encabezado as $item)
            <tr>
                <td>{{$item->id}}</td>   
                <td>{{$item->proveedor->nombres}} {{$item->proveedor->apellidos}}</td>
                <td>{{$item->fecha_hora}}</td>
                <td>Q{{$item->total_compra}}</td>
                <td>
                    <a href="{{route('registrar-compras-libros.show',$item->id)}}" style="text-decoration: none; font-weight:bolder; color:#328CC1;">Detalle de Compra</a>
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