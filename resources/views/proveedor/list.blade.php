@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Proveedores'])
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Proveedores') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('proveedores.create') }}"
                                class="btn btn-sm float-right, text-light" style="background-color: #0b3c5d ;"
                                data-placement="left">
                                {{ __('Nueva proveedor') }}
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
                                        Nombres</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        pellidos</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Teléfono Principal</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">
                                        Correo Electrónico</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($proveedores as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->nombres}}</td>
                                    <td>{{$item->apellidos}}</td>
                                    <td>{{$item->telefono1}}</td>
                                    <td>{{$item->correo}}</td>
                                    <td>
                                        <form action="{{route('proveedores.destroy',$item->id)}}" method="POST">
                                            <a href="{{route('proveedores.show',$item->id)}}"
                                                style="text-decoration: none; font-weight:bolder; color:#328CC1;">Ver</a>
                                            <a href="{{route('proveedores.edit',$item->id)}}"
                                                style="text-decoration: none; font-weight:bolder; color:#328CC1;">Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn"
                                                onclick="return eliminarProveedor('Eliminar Proveedor')"
                                                style="background-color:#328CC1; color:#FFFFFF; font-weight:bolder;">Eliminar</button>
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

    @endsection
    <script>
    function eliminarProveedor(value) {
        action = confirm(value) ? true : event.preventDefault();
    }
    </script>
