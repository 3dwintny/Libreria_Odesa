<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('idLibro') }}
            {{ Form::text('idLibro', $autorLibro->idLibro, ['class' => 'form-control' . ($errors->has('idLibro') ? ' is-invalid' : ''), 'placeholder' => 'Idlibro']) }}
            {!! $errors->first('idLibro', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idAutor') }}
            {{ Form::text('idAutor', $autorLibro->idAutor, ['class' => 'form-control' . ($errors->has('idAutor') ? ' is-invalid' : ''), 'placeholder' => 'Idautor']) }}
            {!! $errors->first('idAutor', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>