@extends('layouts.app')
<link id="pagestyle" href="assets/css/argon-dashboard.css" rel="stylesheet" />
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Compras') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('cre') }}" class="btn btn-sm float-right, text-light" style="background-color: #0b3c5d ;"
                                data-placement="left">
                                {{ __('Nueva compra') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        No.</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Proveedor</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Fecha de Compra</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Total</th>
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
                                        <a href="{{route('registrar-compras-libros.show',$item->id)}}"
                                            style="text-decoration: none; font-weight:bolder; color:#328CC1;">Detalle
                                            de
                                            Compra</a>
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

<script>
function eliminarProveedor(value) {
    action = confirm(value) ? true : event.preventDefault();
}
</script>
@endsection
