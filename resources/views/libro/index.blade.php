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

                        <span id="card_title">
                            {{ __('Libro') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('libros.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('CREAR NUEVO LIBRO') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" name="id">
                            <thead class="thead">
                                <tr>
                                    <th>NO.</th>
                                    <th>TITULO</th>
                                    <th>EDICION</th>
                                    <th>VOLUMEN</th>
                                    <th>TOMO</th>
                                    <th>ACCIONES DE LIBRO</th>
                                    <th>ACCION DE AUTOR</th>
                                    <th>ACCION DE CATEGORIA</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $libro)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->edicion }}</td>
                                    <td>{{ $libro->volumen }}</td>
                                    <td>{{ $libro->tomo }}</td>
                                    <td>
                                        <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('libros.show',$libro->id) }}"><i class="fa fa-fw fa-eye"></i> Ver</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('libros.edit',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> Editar</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>Eliminar</button>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('autor-libros.create',$libro->id) }}" method="GET">
                                            <input type="hidden" id="uname" name="id" value="{{$libro->id}}" readonly="true">
                                            <button type="submit" class="btn btn-sm btn-primary "><i class="fa fa-fw fa-trash"></i>Agregar Autor</button>
                                            <a href="{{ route('autors.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">{{ __('Crear Autor') }}</a>
                                        </form>
                                    </td>
                                    <td>
                                        <form action="{{ route('categoria-libros.create',$libro->id) }}" method="GET">
                                            <input type="hidden" id="uname" name="id" value="{{$libro->id}}" readonly="true">
                                            <button type="submit" class="btn btn-sm btn-primary "><i class="fa fa-fw fa-trash"></i>Agregar Categoria</button>
                                            <a href="{{ route('categoria.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">{{ __('Crear Categoria') }}</a>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            {!! $libros->links() !!}
        </div>
    </div>
</div>
@endsection