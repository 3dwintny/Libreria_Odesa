@extends('layouts.app')

@section('template_title')
    {{ $libroConsignacion->name ?? 'Show Libro Consignacion' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Libro Consignacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('libro-consignacions.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $libroConsignacion->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Egreso:</strong>
                            {{ $libroConsignacion->fecha_egreso }}
                        </div>
                        <div class="form-group">
                            <strong>Idlibro:</strong>
                            {{ $libroConsignacion->libro->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Iddistribuidor:</strong>
                            {{ $libroConsignacion->distribuidor->nombres }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
