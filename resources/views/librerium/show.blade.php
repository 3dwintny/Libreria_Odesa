@extends('layouts.app')

@section('template_title')
    {{ $librerium->name ?? 'Show Librerium' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Librerium</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('libreria.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Libreria:</strong>
                            {{ $librerium->nombre_libreria }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono1:</strong>
                            {{ $librerium->telefono1 }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono2:</strong>
                            {{ $librerium->telefono2 }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion1:</strong>
                            {{ $librerium->direccion1 }}
                        </div>
                        <div class="form-group">
                            <strong>Id Municipio:</strong>
                            {{ $librerium->id_municipio }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
