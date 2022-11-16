<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_libro') }}
            {{ Form::text('id_libro', $inventarioLibrerium->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Id Libro']) }}
            {!! $errors->first('id_libro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('cantidad_stock') }}
            {{ Form::text('cantidad_stock', $inventarioLibrerium->cantidad_stock, ['class' => 'form-control' . ($errors->has('cantidad_stock') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad Stock']) }}
            {!! $errors->first('cantidad_stock', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>