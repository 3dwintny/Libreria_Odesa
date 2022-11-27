@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Crear libro'])
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Libro</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('libros.store') }}" role="form"
                            enctype="multipart/form-data">
                            @csrf
                            @include('libro.form')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
