<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idLibro') }}
            {{ Form::text('idLibro', $categoriaLibro->idLibro, ['class' => 'form-control' . ($errors->has('idLibro') ? ' is-invalid' : ''), 'placeholder' => 'Idlibro']) }}
            {!! $errors->first('idLibro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idCategoria') }}
            {{ Form::text('idCategoria', $categoriaLibro->idCategoria, ['class' => 'form-control' . ($errors->has('idCategoria') ? ' is-invalid' : ''), 'placeholder' => 'Idcategoria']) }}
            {!! $errors->first('idCategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>