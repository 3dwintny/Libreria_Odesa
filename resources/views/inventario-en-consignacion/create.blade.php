@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'inventario en consignacion'])

<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Ingresar Inventario en consignacion</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('consignacion.store') }}" role="form" enctype="multipart/form-data">
                            @csrf

                            @include('inventario-en-consignacion.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
