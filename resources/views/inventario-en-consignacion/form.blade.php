<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_libro') }}
            {{ Form::text('id_libro', $inventarioEnConsignacion->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Id Libro']) }}
            {!! $errors->first('id_libro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad_enviada') }}
            {{ Form::text('cantidad_enviada', $inventarioEnConsignacion->cantidad_enviada, ['class' => 'form-control' . ($errors->has('cantidad_enviada') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Enviada']) }}
            {!! $errors->first('cantidad_enviada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_ingreso') }}
            {{ Form::date('fecha_ingreso', $inventarioEnConsignacion->fecha_ingreso, ['class' => 'form-control' . ($errors->has('fecha_ingreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Ingreso']) }}
            {!! $errors->first('fecha_ingreso', '<div class="invalid-feedback ">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idDistribuidor') }}
            {{ Form::text('idDistribuidor', $inventarioEnConsignacion->idDistribuidor, ['class' => 'form-control' . ($errors->has('idDistribuidor') ? ' is-invalid' : ''), 'placeholder' => 'Iddistribuidor']) }}
            {!! $errors->first('idDistribuidor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>