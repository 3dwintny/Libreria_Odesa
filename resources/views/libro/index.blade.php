@extends('layouts.app')

@section('content')
<!-- @include('layouts.navbars.auth.topnav', ['title' => 'User Management']) -->

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
                            <a href="{{ route('libros.create') }}" style="background-color: #0b3c5d;" class="btn btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
                            </a>
                        </div>
                        <div class="float-right">
                            <a href="{{ route('libros.create') }}" style="background-color: #0b3c5d;" class="btn btn-sm float-right" data-placement="left">
                                {{ __('Crear Nuevo') }}
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
                        <table class="table table-striped table-hover">
                            <thead class="thead">
                                <tr>
                                    <th>No</th>

                                    <th>Titulo</th>
                                    <th>Edicion</th>
                                    <th>Volumen</th>
                                    <th>Tomo</th>
                                    <th>Foto</th>
                                    <th>Fecha Fotografia</th>
                                    <th>Paginas</th>
                                    <th>Isbn</th>
                                    <th>Anio</th>
                                    <th>Preciocompra</th>
                                    <th>Precioventa</th>
                                    <th>Idlibreria</th>

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
                                    <!--											<td>{{ $libro->foto }}</td> -->
                                    <!--											<td>{{ $libro->fecha_fotografia }}</td> -->
                                    <td>{{ $libro->paginas }}</td>
                                    <td>{{ $libro->isbn }}</td>
                                    <td>{{ $libro->anio }}</td>
                                    <td>{{ $libro->precioCompra }}</td>
                                    <td>{{ $libro->precioVenta }}</td>
                                    <td>{{ $libro->idLibreria }}</td>
                                    <!--											<td>{{ $libro->fecha_fotografia }}</td> -->

                                    <td>
                                        <form action="{{ route('libros.destroy',$libro->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('libros.show',$libro->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('libros.edit',$libro->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> Delete</button>
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
