@extends('layouts.app')
@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Compras'])
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                @includeif('partials.errors')
                <div class="card-body">
                    <form action="{{route('proveedores.store')}}" method="POST" role="form"
                        enctype="multipart/form-data">
                        @csrf
                        <label class="form-label">Nombres</label>
                        <input class="form-control form-control-lg" type="text" name="nombres" id=""
                            placeholder="Nombres" required>
                        <label class="form-label">Apellidos</label>
                        <input class="form-control form-control-lg" type="text" name="apellidos" id=""
                            placeholder="Apellidos" required>
                        <label class="form-label">Número de Teléfono Principal</label>
                        <input class="form-control form-control-lg" type="tel" name="telefono1" id=""
                            placeholder="Teléfono Principal" required>
                        <label class="form-label">Número de Télefono Secundario</label>
                        <input class="form-control form-control-lg" type="tel" name="telefono2" id=""
                            placeholder="Teléfono Secundario" required>
                        <label class="form-label">Correo Electrónico</label>
                        <input class="form-control form-control-lg" type="email" name="correo" id=""
                            placeholder="Correo Electrónico" required>
                        <label class="form-label">Dirección</label>
                        <textarea class="form-control" name="direccion" id="" placeholder="Dirección" cols="40" rows="5"
                            required style="resize: none;"></textarea>
                        <button type="submit" class="btn btn-primary mb-3" style="background-color: #;">Guardar</button>
                        <button type="submit" onclick="window.location='{{ url('proveedores') }}'"
                            class="btn btn-danger mb-3" data-bs-toggle="button">Cancelar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
