<div class="box box-info padding-1">
    <div class="box-body">


        <div class="form-group">
            {{ Form::label('nombre_libreria') }}
            {{ Form::text('nombre_libreria', $librerium->nombre_libreria, ['class' => 'form-control' . ($errors->has('nombre_libreria') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Libreria']) }}
            {!! $errors->first('nombre_libreria', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono1') }}
            {{ Form::text('telefono1', $librerium->telefono1, ['class' => 'form-control' . ($errors->has('telefono1') ? ' is-invalid' : ''), 'placeholder' => 'Telefono1']) }}
            {!! $errors->first('telefono1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono2') }}
            {{ Form::text('telefono2', $librerium->telefono2, ['class' => 'form-control' . ($errors->has('telefono2') ? ' is-invalid' : ''), 'placeholder' => 'Telefono2']) }}
            {!! $errors->first('telefono2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('direccion1') }}
            {{ Form::text('direccion1', $librerium->direccion1, ['class' => 'form-control' . ($errors->has('direccion1') ? ' is-invalid' : ''), 'placeholder' => 'Direccion1']) }}
            {!! $errors->first('direccion1', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('id_municipio') }}
            {{ Form::select('id_municipio',$municipios, $librerium->id_municipio, ['class' => 'form-control' . ($errors->has('id_municipio') ? ' is-invalid' : ''), 'placeholder' => 'Id Municipio']) }}
            {!! $errors->first('id_municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>