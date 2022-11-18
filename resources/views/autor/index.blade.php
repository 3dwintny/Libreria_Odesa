@extends('layouts.app')

@section('template_title')
Autor
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">

                        <span id="card_title">
                            {{ __('Autor') }}
                        </span>

                        <div class="float-right">
                            <a href="{{ route('autors.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Crear nuevo Autor') }}
                            </a>
                        </div>
                    </div>
                </div>

                <div class="card-body">
                            <a class="btn btn-primary" href="{{ route('libros.index') }}"> Libros</a>
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

                                    <th>Nombre Autor</th>

                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($autors as $autor)
                                <tr>
                                    <td>{{ ++$i }}</td>

                                    <td>{{ $autor->nombre_autor }}</td>

                                    <td>
                                        <form action="{{ route('autors.destroy',$autor->id) }}" method="POST">
                                            <a class="btn btn-sm btn-primary " href="{{ route('autors.show',$autor->id) }}"><i class="fa fa-fw fa-eye"></i> Show</a>
                                            <a class="btn btn-sm btn-success" href="{{ route('autors.edit',$autor->id) }}"><i class="fa fa-fw fa-edit"></i> Edit</a>
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
            {!! $autors->links() !!}
        </div>
    </div>
</div>
@endsection