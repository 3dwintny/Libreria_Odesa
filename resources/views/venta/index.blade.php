@extends('layouts.app')

@section('content')
<div class="container">
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif    
@section('css')
<link rel="stylesheet"  href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css">
@endsection
<a href="{{url('venta/create')}}" class="btn btn-success">Agergar una venta</a>
<br>
<br>
<div >
    <table class="table table-light" id="hola">
        <thead>
            <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>nombre</th>
                <th>nit</th>
                <th>Direccion</th>
                <th>subtotal</th>
                <th>descuento</th>
                <th>recargo</th>
                <th>total</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($ventas as $venta)
                <tr>
                    <td>{{$venta->id}}</td>
                    <td>{{$venta->fecha_hora_venta}}</td>
                    <td>{{$venta->nombre_cliente}}</td>
                    <td>{{$venta->nit_cliente}}</td>
                    <td>{{$venta->direccion}}</td>
                    <td>{{$venta->subtotal_venta}}</td>
                    <td>{{$venta->descuento_total_sobre_venta}}</td>
                    <td>{{$venta->recargo_sobre_vemta}}</td>
                    <td>{{$venta->total_venta}}</td>
                    <td>
                        
                        <form  action="{{url('/venta/'.$venta->id)}}" method="post" class="d-inline">
                            @csrf
                            {{method_field('DELETE')}}
                            <input class="btn btn-danger" type="submit" onclick="return confirm('¿Quires borrar?')" value="borrar">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $('#hola').DataTable();
</script>
@endsection