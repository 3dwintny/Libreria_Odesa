@extends('layouts.app')

@section('template_title')
Libro
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title"><strong>
                                {{ __('LIBRO') }}</strong>
                        </span>

                        <div class="float-right">
                        </div>
                    </div>

                    <div class="card card-default">
                        <div class="card-header">
                            <span class="card-title">BUSCAR POR CATEGORIAS</span>
                        </div>

                        <div class="card-body">
                        <form method="GET" action="{{ route('catalogos1.create') }}" role="form" enctype="multipart/form-data">
                            <div class="form-group">
                                <select name="select">
                                    @foreach ($categorias as $cat){
                                    <option value="{{$cat->id}}"> {{$cat->nombre_categoria}}</option>
                                    }
                                    @endforeach
                                </select>
                                <button type="submit" class="btn btn-sm btn-primary ">Buscar</button>
                            </div>
                        </form>
                        </div>
                        <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('catalogos.index') }}"> TODAS</a>
                        </div>
                    </div>



                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover" name="id">
                                <thead class="thead">
                                    <tr>
                                        <th>LIBRO</th>
                                        <th>FOTOGAFIA</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libros as $libro)
                                    <tr>
                                        <td><strong>{{ $libro->titulo }}</strong>
                                            <p>Edicion: {{ $libro->edicion }}</p>
                                            <p>Volumen: {{ $libro->volumen }}</p>
                                            <p>Tomo: {{ $libro->tomo }}</p>
                                            <p>Precio: Q. {{ $libro->precioVenta }}</p>
                                        </td>
                                        <td> <img src="{{ asset('uploads/libros/'.$libro->foto) }}" width="100px" height="100px" alt="Image"> </td>
                                        <td>
                                            <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('catalogos.show',$libro->id) }}"><i class="fa fa-fw fa-eye"></i>INFORMACION</a>
                                                @csrf
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection