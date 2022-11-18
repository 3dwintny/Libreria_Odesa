@extends('layouts.app')

@section('template_title')
{{ $libro->name ?? 'Show Libro' }}
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">


                <div class="card-body">
                    <a class="btn btn-primary" href="{{ route('libros.index') }}"> LIBROS</a>
                    <a class="btn btn-primary" href="{{ route('libro-consignacions.index') }}"> LIBROS CONSIGNADOS</a>
                </div>
                <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">INFORMACION DEL LIBRO</span>
                </div>

            </div>

            <div class="card card-default">
                <div class="card-body">
                    <div class="form-group">
                        <strong>TITULO:</strong>
                        {{ $libro->titulo }}
                    </div>
                    <div class="form-group">
                        <strong>EDICION:</strong>
                        {{ $libro->edicion }}
                    </div>
                    <div class="form-group">
                        <strong>VOLUMEN:</strong>
                        {{ $libro->volumen }}
                    </div>
                    <div class="form-group">
                        <strong>TOMO:</strong>
                        {{ $libro->tomo }}
                    </div>
                    <div class="form-group">
                        <strong>EDITORIAL:</strong>
                        {{ $libro->editorial }}
                    </div>
                    <div class="form-group">
                        <strong>FOTOGRAFIA DEL LIBRO:</strong>
                        <img src="{{ asset('uploads/libros/'.$libro->foto) }}" width="70px" height="70px" alt="Image">
                    </div>
                    <div class="form-group">
                        <strong>FECHA DE LA FOTOGRAFIA:</strong>
                        {{ $libro->fecha_fotografia }}
                    </div>
                    <div class="form-group">
                        <strong>NO. PAGINAS:</strong>
                        {{ $libro->paginas }}
                    </div>
                    <div class="form-group">
                        <strong>ISBN:</strong>
                        {{ $libro->isbn }}
                    </div>
                    <div class="form-group">
                        <strong>AÑO:</strong>
                        {{ $libro->anio }}
                    </div>
                    <div class="form-group">
                        <strong>PRECIO COMPRA:</strong>
                        {{ $libro->precioCompra }}
                    </div>
                    <div class="form-group">
                        <strong>PRECIO VENTA:</strong>
                        <label for="">{{ $libro->precioVenta }}</label>
                    </div>
                    <div class="form-group">
                        <strong>LIBRERIA:</strong>
                        {{ $libreria->nombre_libreria }}
                    </div>

                    <div class="form-group">
                    <strong><center>AUTORES DEL LIBRO:</center></strong>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" name="id">
                                    <thead class="thead">
                                        <tr>
                                            <th>Autor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($a as $an)
                                        <tr>
                                            <td>{{ $an->nombre_autor }}</td>
                                            <td>
                                                <form action="{{ route('autor-libros.destroy',$an->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('autor-libros.show',$an->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('autor-libros.edit',$an->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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

                    <div class="form-group">
                        <strong><center>CATEGORIAS DEL LIBRO:</center></strong>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover" name="id">
                                    <thead class="thead">
                                        <tr>
                                            <th>Categoria</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($c as $ct)
                                        <tr>
                                            <td>{{ $ct->nombre_categoria }}</td>
                                            <td>
                                                <form action="{{ route('categoria-libros.destroy',$ct->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categoria-libros.show',$ct->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categoria-libros.edit',$ct->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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


                </div>
            </div>

        </div>
    </div>
</section>
@endsection