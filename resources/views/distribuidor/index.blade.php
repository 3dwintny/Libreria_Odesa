@extends('layouts.app')

@section('template_title')
    Distribuidor
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('DISTRIBUIDOR') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('distribuidors.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo Distribuidor') }}
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
                                        
										<th>Nombres</th>
										<th>Apellidos</th>
										<th>1er Telefono</th>
										<th>2do Telefono</th>
										<th>Correo</th>
										<th>Direccion</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($distribuidors as $distribuidor)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $distribuidor->nombres }}</td>
											<td>{{ $distribuidor->apellidos }}</td>
											<td>{{ $distribuidor->telefono }}</td>
											<td>{{ $distribuidor->telefono1 }}</td>
											<td>{{ $distribuidor->correo }}</td>
											<td>{{ $distribuidor->direccion }}</td>

                                            <td>
                                                <form action="{{ route('distribuidors.destroy',$distribuidor->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('distribuidors.show',$distribuidor->id) }}"><i class="fa fa-fw fa-eye"></i> VER</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('distribuidors.edit',$distribuidor->id) }}"><i class="fa fa-fw fa-edit"></i> EDITAR</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i>BORRAR</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $distribuidors->links() !!}
            </div>
        </div>
    </div>
@endsection
