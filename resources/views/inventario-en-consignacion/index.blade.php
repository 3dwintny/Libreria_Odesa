@extends('layouts.app')

@section('template_title')
    Inventario En Consignacion
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inventario En Consignacion') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inventario-en-consignacion.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Id Libro</th>
										<th>Cantidad Enviada</th>
										<th>Fecha Ingreso</th>
										<th>Iddistribuidor</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventarioEnConsignacion as $inventarioEnConsignacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $inventarioEnConsignacion->id_libro }}</td>
											<td>{{ $inventarioEnConsignacion->cantidad_enviada }}</td>
											<td>{{ $inventarioEnConsignacion->fecha_ingreso }}</td>
											<td>{{ $inventarioEnConsignacion->idDistribuidor }}</td>

                                            <td>
                                                <form action="{{ route('inventario-en-consignacions.destroy',$inventarioEnConsignacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inventario-en-consignacion.show',$inventarioEnConsignacion->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inventario-en-consignacion.edit',$inventarioEnConsignacion->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $inventarioEnConsignacion->links() !!}
            </div>
        </div>
    </div>
@endsection
