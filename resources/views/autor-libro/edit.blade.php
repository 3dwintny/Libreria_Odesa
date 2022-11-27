@extends('layouts.app')

@section('template_title')
    Update Autor Libro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Update Autor Libro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('autor-libros.update', $autorLibro->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('autor-libro.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
