@extends('layouts.app')

@section('template_title')
    Create Libro Consignacion
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Create Libro Consignacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('libro-consignacions.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('libro-consignacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
