@extends('layouts.app')
@section('content')
<div class="container">
    <form action="{{route('proveedores.update',$proveedor->id)}}" method="POST">
        @csrf
        {{method_field('PUT')}}
        <label class="form-label">Nombres</label>
        <input class="form-control form-control-lg"  type="text" name="nombres" id="" placeholder="Nombres" value="{{$proveedor->nombres}}">
        <label class="form-label">Apellidos</label>
        <input class="form-control form-control-lg"  type="text" name="apellidos" id="" placeholder="Apellidos" value="{{$proveedor->apellidos}}">
        <label class="form-label">Número de Teléfono Principal</label>
        <input class="form-control form-control-lg"  type="tel" name="telefono1" id="" placeholder="Teléfono Principal" value="{{$proveedor->telefono1}}">
        <label class="form-label">Número de Télefono Secundario</label>
        <input class="form-control form-control-lg"  type="tel" name="telefono2" id="" placeholder="Teléfono Secundario" value="{{$proveedor->telefono2}}">
        <label class="form-label">Correo Electrónico</label>
        <input class="form-control form-control-lg"  type="email" name="correo" id="" placeholder="Correo Electrónico" value="{{$proveedor->correo}}">
        <label class="form-label">Dirección</label>
        <textarea class="form-control" name="direccion" id="" placeholder="Dirección" cols="40" rows="5" style="resize: none;">{{$proveedor->direccion}}</textarea>
        <input type="submit" value="Actualizar" class="btn btn-primary" data-bs-toggle="button">
        <input type="button" onclick="window.location='{{ url('proveedores') }}'" value="Cancelar" class="btn btn-danger" data-bs-toggle="button">
    </form>
</div>
@endsection