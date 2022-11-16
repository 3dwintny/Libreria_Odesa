@extends('layouts.app')
@section('content')
    <form method="POST" enctype="multipart/form-data" role="form" 
    action="{{route('registrar-compras-libros.store')}}">
    @csrf
    <div class="container">
        <label class="form-label">Proveedor</label>
        <select name="proveedor_id" class="form-select" required>
            <option selected disabled>Proveedor</option>
            @foreach ($proveedores as $item)
                <option value="{{$item->id}}">{{$item->nombres}} {{$item->apellidos}}</option>
            @endforeach
        </select>
        <br>
        <label class="form-label">Fecha de Compra</label>
        <input type="date" name="fecha_hora" id="" class="form-control form-control-lg" required>
        <label class="form-label">Total</label>
        <input type="text" name="total_compra" placeholder="Total" id="" class="form-control form-control-lg" required>
        <button type="submit" class="btn btn-primary mb-3">Guardar</button>
        <button type="submit" onclick="window.location='{{ url('proveedores') }}'" class="btn btn-danger mb-3" data-bs-toggle="button">Cancelar</button>
    </div>
</form>
@endsection