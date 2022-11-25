@extends('layouts.app')

@section('template_title')
Create Librerium
@endsection

@section('content')
<section class="content container-fluid">
    <div class="row">
        <div class="col-md-12">

            @includeif('partials.errors')

            <div class="card card-default">
                <div class="card-header">
                    <span class="card-title">Create Librerium</span>
                </div>
                <div class="card-body">
                    <form method="GET" action="{{ route('libreria.create',$departamento->id) }}" role="form" enctype="multipart/form-data">
                        @csrf
                        <div class="box box-info padding-1">
                            <div class="box-body">

                                <div class="form-group">
                                    {{ Form::label('departamento') }}
                                    {{ Form::select('id',$departamentos1, $departamento->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'Departamento']) }}
                                    {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                            </div>
                            <div class="box-footer mt20">
                                <button type="submit" class="btn btn-primary">Continuar</button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</section>
@endsection