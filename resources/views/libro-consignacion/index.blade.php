@extends('layouts.app')

@section('template_title')
    Libro Consignacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Libro Consignacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('libro-consignacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        
										<th>LIBRO</th>
										<th>INFORMACION LIBRO</th>
										<th>DISTRIBUIDOR</th>
										<th>INFORMACION DISTRIBUIDOR</th>
										<th>CANTIDAD </th>
										<th>FECHA EGRESO</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libroConsignacions as $libroConsignacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $libroConsignacion->libro->titulo }}</td>
                                            <td>
                                                <form action="{{ route('libro-consignacions.destroy',$libroConsignacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('libros.show',$libroConsignacion->libro->id) }}"><i class="fa fa-fw fa-eye"></i>Informacion</a>
                                                    @csrf
                                                </form>
                                            </td>

                                            <td>{{ $libroConsignacion->distribuidor->nombres }}</td>
                                            <td>
                                                <form action="{{ route('distribuidors.destroy',$libroConsignacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('distribuidors.show',$libroConsignacion->distribuidor->id) }}"><i class="fa fa-fw fa-eye"></i> Informacion</a>
                                                    @csrf
                                                </form>
                                            </td>
											<td>{{ $libroConsignacion->cantidad }}</td>
											<td>{{ $libroConsignacion->fecha_egreso }}</td>

                                            <td>
                                                <form action="{{ route('libro-consignacions.destroy',$libroConsignacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('libro-consignacions.show',$libroConsignacion->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('libro-consignacions.edit',$libroConsignacion->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $libroConsignacions->links() !!}
            </div>
        </div>
    </div>
@endsection
