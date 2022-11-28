@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Ventas'])

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Ventas') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route( 'venta.create') }}" class="btn btn-sm float-right, text-light"
                                style="background-color: #0b3c5d ;" data-placement="left">
                                {{ __('Agregar nueva venta') }}</a>
                        </div>
                    </div>
                </div>

                @if(Session::has('mensaje'))
                {{Session::get('mensaje')}}
                @endif
                <!-- <a href="{{url('venta/create')}}" class="btn btn-success">Agergar una venta</a> -->
                <br>
                <br>
                <div class="card-body">
                    <div class="table-responsive">
                    <table class="table table-striped table-hover" id="hola">
                        <thead class="thead">
                            <tr>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Fecha</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nombre</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nit</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Direccion</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">subtotal</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">descuento</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">recargo</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">total</th>
                                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Acciones</th>
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

                                    <form action="{{url('/venta/'.$venta->id)}}" method="post" class="d-inline">
                                        @csrf
                                        {{method_field('DELETE')}}
                                        <input class="btn btn-danger" type="submit"
                                            onclick="return confirm('¿Quires borrar?')" value="borrar">
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        </div>
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
