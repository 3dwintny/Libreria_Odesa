@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ url('/venta') }}" method="POST">
            @csrf
            @include('venta.form', ['modo' => 'Crear'])
            <hr>
        </form>
    </div>
@endsection
