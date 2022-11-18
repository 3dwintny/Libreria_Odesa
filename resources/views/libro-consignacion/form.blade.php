<div class="box box-info padding-1">
    <div class="box-body">
        
    <div class="form-group">
            {{ Form::label('LIBRO') }}
            {{ Form::select('idLibro',$libros, $libroConsignacion->idLibro, ['class' => 'form-control' . ($errors->has('idLibro') ? ' is-invalid' : ''), 'placeholder' => 'Libro']) }}
            {!! $errors->first('idLibro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('DISTRIBUIDOR') }}
            {{ Form::select('idDistribuidor',$distribuidores, $libroConsignacion->idDistribuidor, ['class' => 'form-control' . ($errors->has('idDistribuidor') ? ' is-invalid' : ''), 'placeholder' => 'Distribuidor']) }}
            {!! $errors->first('idDistribuidor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CANTIDAD') }}
            {{ Form::number('cantidad', $libroConsignacion->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FECHA EGRESO') }}
            {{ Form::date('fecha_egreso', $libroConsignacion->fecha_egreso, ['class' => 'form-control' . ($errors->has('fecha_egreso') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Egreso']) }}
            {!! $errors->first('fecha_egreso', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>