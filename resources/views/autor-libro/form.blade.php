<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('TITULO DE LIBRO') }}
            {{ Form::select('idLibro',$libros,$autorLibro->idLibro, ['class' => 'form-control' . ($errors->has('idLibro') ? ' is-invalid' : '')]) }}
            {!! $errors->first('idLibro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('AUTORES') }}
            {{ Form::select('idAutor',$autores, $autorLibro->idAutor, ['class' => 'form-control' . ($errors->has('idAutor') ? ' is-invalid' : ''), 'placeholder' => 'Idautor']) }}
            {!! $errors->first('idAutor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>