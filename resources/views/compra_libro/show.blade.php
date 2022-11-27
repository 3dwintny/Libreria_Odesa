@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="container">

    <div class="d-flex flex-row-reverse">
        <div class="p-2">
        <a href="{{route('registrar-compras-libros.index')}}" style="text-decoration: none;"><--Regresar--</a>
        </div>
    </div>
    <h1>Detalle de Compra</h1>
            <div class="d-flex flex-row mb-3">
                <div class="p-2" style="font-weight: bolder; color:#328CC1;">Proveedor</div>
                <div class="p-2">{{$compras->proveedor->nombres}} {{$compras->proveedor->apellidos}}</div>
                <div class="p-2" style="font-weight: bolder; color:#328CC1;">Fecha de Compra</div>
                <div class="p-2">{{$compras->fecha_hora}}</div>
            </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-dark">
                <th>Título</th>
                <th>Edición</th>
                <th>Cantidad</th>
                <th>Precio de Compra</th>
                <th>SubTotal</th>
            </thead>
            <tbody>
                @php
                    $i=0;
                @endphp
                @foreach($detalle as $item)
                <tr>
                    <td>{{$item->libro->titulo}}</td>
                    <td>{{$item->libro->edicion}}</td>
                    <td>{{$item->cantidadLibros}}</td>
                    <td>Q{{$item->precioCompraLibro}}</td>
                    <td>Q{{number_format($subtotal[$i],2)}}</td>
                </tr>
                @php
                    $i=$i+1;
                @endphp
                @endforeach
            </tbody>
        </table>
        <div class="d-flex flex-row-reverse">
            <div class="p-2" style="font-weight: bolder;">TOTAL: Q{{$compras->total_compra}}</div>
        </div>
    </div>
</div>
@endsection
