@extends('layouts.app')

@section('template_title')
    {{ $autorLibro->name ?? 'Show Autor Libro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Ver autores Libro</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('autor-libros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Idlibro:</strong>
                            {{ $libroA->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Idautor:</strong>
                            {{ $autorA->nombre_autor }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
