@extends('layouts.app')
@section('content')
<div class="container">
    <div class="d-flex flex-row-reverse">
        <div class="p-2" style="">
            <a href="{{route('registrar-compras-libros.index')}}" style="text-decoration: none; font-weight:bolder;">Listado de Compras</a>
        </div>
    </div>

    <h1>Compras</h1>
</div>
    <div class="container" style="background-color: #EFEFEF; border-radius:20px;">   
    <div class="d-flex flex-row mb-3">
        <div class="p-2" style="font-weight: bolder;">BÚSQUEDA</div>
    </div>

    <form method="POST" action="{{route('buscarProveedor')}}">
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
                    
                </div><input type="submit" onclick="window.location='{{ route('buscarProveedor') }}'" value="Buscar" 
                style="background-color: #77C9D4; color:#328CC1; font-weight:bolder; border:0px; 
                border-radius:5px;width:5em; height:15%; margin-top:2.5em;">
                </div>
        </center>
    </form>

    <form method="POST" action="{{route('buscarFecha')}}">
        @csrf

        <div>
            <center>
                <label class="form-label">Inicio</label>
                <input type="date" name="inicial" id="inicial" style="width:7em;">
                <label class="form-label">Fin</label>
                <input type="date" name="final" id="final" style="width:7em;">
                <input type="submit" onclick="window.location='{{ route('buscarProveedor') }}'" value="Buscar"
                style="background-color: #77C9D4; color:#328CC1; font-weight:bolder; border:0px; 
                border-radius:5px;width:5em; height:15%; margin-top:2.5em;">
            </center>
        </div>
    </form>
    </div>

    <br>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Proveedor</th>
                        <th>Fecha de Compra</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="4" style="text-align: center; font-weight:bolder;">SIN RESULTADOS</td></tr>  
                </tbody>
            </table>
        </div>
    </div>
@endsection