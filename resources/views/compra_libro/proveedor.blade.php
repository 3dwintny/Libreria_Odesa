@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Compras</h1>
    <div class="d-flex flex-row mb-3">
        <div class="p-2" style="font-weight: bolder;">BÚSQUEDA</div>
    </div>
    <div class="d-flex flex-row mb-3">
        <form method="POST" action="{{route('buscarProveedor')}}">
            @csrf
            <div class="d-flex flex-row mb-3">
                <label>Nombre(s) de Proveedor</label>
                <input type="text" name="nombres" id="nombres">
                <label>Apellido(s) de Proveedor</label>
                <input type="text" name="apellidos" id="apellidos">
                <input type="submit" onclick="window.location='{{ route('buscarProveedor') }}'" value="Buscar">
            </div>
        </form>
    </div>
    <div class="d-flex flex-row mb-3">
        <form method="POST" action="{{route('buscarFecha')}}">
            @csrf
            <div class="d-flex flex-row mb-3">
                <label>Fecha Inicial</label>
                <input type="date" name="inicial" id="inicial">
                <label>Fecha Final</label>
                <input type="date" name="final" id="final">
                <input type="submit" onclick="window.location='{{ route('buscarFecha') }}'" value="Buscar">
            </div>
        </form>
    </div>
</div>
</div>
    @endsection