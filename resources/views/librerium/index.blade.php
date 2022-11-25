@extends('layouts.app')

@section('template_title')
    Librerium
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Librerium') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('deptoLibreria.index') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        
										<th>Nombre Libreria</th>
										<th>Telefono1</th>
										<th>Telefono2</th>
										<th>Direccion1</th>
										<th>Id Municipio</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($libreria as $librerium)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $librerium->nombre_libreria }}</td>
											<td>{{ $librerium->telefono1 }}</td>
											<td>{{ $librerium->telefono2 }}</td>
											<td>{{ $librerium->direccion1 }}</td>
											<td>{{ $librerium->id_municipio }}</td>

                                            <td>
                                                <form action="{{ route('libreria.destroy',$librerium->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('libreria.show',$librerium->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('libreria.edit',$librerium->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $libreria->links() !!}
            </div>
        </div>
    </div>
@endsection
