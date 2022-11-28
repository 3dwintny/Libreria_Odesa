@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Ventas'])
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                @includeif('partials.errors')
                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">Crear Venta</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('/venta') }}" method="POST">
                            @csrf
                            @include('venta.form', ['modo' => 'Crear'])
                            <hr>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
