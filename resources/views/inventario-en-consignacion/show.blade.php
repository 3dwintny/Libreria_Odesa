@extends('layouts.app')

@section('template_title')
    {{ $inventarioEnConsignacion->name ?? 'Show Inventario En Consignacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Inventario En Consignacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inventario-en-consignacion.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Libro:</strong>
                            {{ $inventarioEnConsignacion->id_libro }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Enviada:</strong>
                            {{ $inventarioEnConsignacion->cantidad_enviada }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Ingreso:</strong>
                            {{ $inventarioEnConsignacion->fecha_ingreso }}
                        </div>
                        <div class="form-group">
                            <strong>Iddistribuidor:</strong>
                            {{ $inventarioEnConsignacion->idDistribuidor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
