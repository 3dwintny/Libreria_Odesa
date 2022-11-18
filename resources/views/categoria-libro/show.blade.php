@extends('layouts.app')

@section('template_title')
    {{ $categoriaLibro->name ?? 'Show Categoria Libro' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">INFORMACION DE CATEGORIA DE LIBRO</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('categoria-libros.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>LIBRO:</strong>
                            {{ $libroC->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>CATEGORIA:</strong>
                            {{ $categoriaC->nombre_categoria }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
