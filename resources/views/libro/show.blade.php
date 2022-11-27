@extends('layouts.app')

@section('template_title')
    {{ $libro->name ?? 'Show Libro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('libros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $libro->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Edicion:</strong>
                            {{ $libro->edicion }}
                        </div>
                        <div class="form-group">
                            <strong>Volumen:</strong>
                            {{ $libro->volumen }}
                        </div>
                        <div class="form-group">
                            <strong>Tomo:</strong>
                            {{ $libro->tomo }}
                        </div>
<!--                        <div class="form-group">
                            <strong>Foto:</strong>
                            {{ $libro->foto }}
                        </div>
-->                        
<!--
                            <div class="form-group">
                            <strong>Fecha Fotografia:</strong>
                            {{ $libro->fecha_fotografia }}
                        </div> 
-->                        
                        <div class="form-group">
                            <strong>Paginas:</strong>
                            {{ $libro->paginas }}
                        </div>
                        <div class="form-group">
                            <strong>Isbn:</strong>
                            {{ $libro->isbn }}
                        </div>
                        <div class="form-group">
                            <strong>Anio:</strong>
                            {{ $libro->anio }}
                        </div>
                        <div class="form-group">
                            <strong>Preciocompra:</strong>
                            {{ $libro->precioCompra }}
                        </div>
                        <div class="form-group">
                            <strong>Precioventa:</strong>
                            {{ $libro->precioVenta }}
                        </div>
<!--                         <div class="form-group">
                            <strong>Idlibreria:</strong>
                            {{ $libro->idLibreria }}
                        </div>
-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
