<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('LIBRO') }}
            {{ Form::select('idLibro',$libros, $categoriaLibro->idLibro, ['class' => 'form-control' . ($errors->has('idLibro') ? ' is-invalid' : '')]) }}
            {!! $errors->first('idLibro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('CATEGORIAS') }}
            {{ Form::select('idCategoria',$categorias, $categoriaLibro->idCategoria, ['class' => 'form-control' . ($errors->has('idCategoria') ? ' is-invalid' : ''), 'placeholder' => 'Idcategoria']) }}
            {!! $errors->first('idCategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>