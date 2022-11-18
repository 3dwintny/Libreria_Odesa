@extends('layouts.app')

@section('template_title')
    {{ $distribuidor->name ?? 'Show Distribuidor' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Informacion del  Distribuidor</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('distribuidors.index') }}"> DISTRIBUIDORES</a>
                            <a class="btn btn-primary" href="{{ route('libro-consignacions.index') }}"> LIBROS CONSIGNADOS</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombres:</strong>
                            {{ $distribuidor->nombres }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $distribuidor->apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>1er Telefono:</strong>
                            {{ $distribuidor->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>2do Telefono:</strong>
                            {{ $distribuidor->telefono1 }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $distribuidor->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $distribuidor->direccion }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
