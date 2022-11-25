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
                        <th>Apelldios</th>
                        <th>Teléfono Principal</th>
                        <th>Correo Electrónico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td colspan="5" style="text-align: center; font-weight:bolder;">SIN RESULTADOS</td></tr>  
                </tbody>
            </table>
        </div>
    </div>
@endsection