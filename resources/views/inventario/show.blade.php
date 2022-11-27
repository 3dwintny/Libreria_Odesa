@extends('layouts.app')

@section('template_title')
    {{ $inventarioLibrerium->name ?? 'Show Inventario Librerium' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Inventario Librerium</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('inventario-libreria.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Libro:</strong>
                            {{ $inventarioLibrerium->id_libro }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad Stock:</strong>
                            {{ $inventarioLibrerium->cantidad_stock }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
