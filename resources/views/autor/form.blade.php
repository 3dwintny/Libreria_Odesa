<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombre_autor') }}
            {{ Form::text('nombre_autor', $autor->nombre_autor, ['class' => 'form-control' . ($errors->has('nombre_autor') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Autor']) }}
            {!! $errors->first('nombre_autor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>