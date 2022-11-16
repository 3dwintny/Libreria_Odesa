@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'User Management'])
<div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Inventario Librerium') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('inventario.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No</th>

										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id Libro</th>
										<th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Cantidad Stock</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventarioLibreria as $inventarioLibrerium)
                                        <tr>
                                            <td>{{ ++$i }}</td>

											<td>{{ $inventarioLibrerium->id_libro }}</td>
											<td>{{ $inventarioLibrerium->cantidad_stock }}</td>

                                            <td>
                                                <form action="{{ route('inventario.destroy',$inventarioLibrerium->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('inventario.show',$inventarioLibrerium->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('inventario.edit',$inventarioLibrerium->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
                {!! $inventarioLibreria->links() !!}
            </div>
        </div>
    </div>
@endsection
