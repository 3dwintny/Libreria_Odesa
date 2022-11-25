<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $libro->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('edicion') }}
            {{ Form::number('edicion', $libro->edicion, ['class' => 'form-control' . ($errors->has('edicion') ? ' is-invalid' : ''), 'placeholder' => 'Edicion']) }}
            {!! $errors->first('edicion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('volumen') }}
            {{ Form::number('volumen', $libro->volumen, ['class' => 'form-control' . ($errors->has('volumen') ? ' is-invalid' : ''), 'placeholder' => 'Volumen']) }}
            {!! $errors->first('volumen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tomo') }}
            {{ Form::number('tomo', $libro->tomo, ['class' => 'form-control' . ($errors->has('tomo') ? ' is-invalid' : ''), 'placeholder' => 'Tomo']) }}
            {!! $errors->first('tomo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('foto') }}
            {{ Form::text('foto', $libro->foto, ['class' => 'form-control' . ($errors->has('foto') ? ' is-invalid' : ''), 'placeholder' => 'Foto']) }}
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_fotografia') }}
            {{ Form::date('fecha_fotografia', $libro->fecha_fotografia, ['class' => 'form-control' . ($errors->has('fecha_fotografia') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fotografia']) }}
            {!! $errors->first('fecha_fotografia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('paginas') }}
            {{ Form::number('paginas', $libro->paginas, ['class' => 'form-control' . ($errors->has('paginas') ? ' is-invalid' : ''), 'placeholder' => 'Paginas']) }}
            {!! $errors->first('paginas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('isbn') }}
            {{ Form::text('isbn', $libro->isbn, ['class' => 'form-control' . ($errors->has('isbn') ? ' is-invalid' : ''), 'placeholder' => 'Isbn']) }}
            {!! $errors->first('isbn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('anio') }}
            {{ Form::text('anio', $libro->anio, ['class' => 'form-control' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Anio']) }}
            {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precioCompra') }}
            {{ Form::text('precioCompra', $libro->precioCompra, ['class' => 'form-control' . ($errors->has('precioCompra') ? ' is-invalid' : ''), 'placeholder' => 'Preciocompra'])}}
            {!! $errors->first('precioCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('precioVenta') }}
            {{ Form::text('precioVenta', $libro->precioVenta, ['class' => 'form-control' . ($errors->has('precioVenta') ? ' is-invalid' : ''), 'placeholder' => 'Precioventa'])}}
            {!! $errors->first('precioVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idLibreria') }}
            {{ Form::number('idLibreria', $libro->idLibreria, ['class' => 'form-control' . ($errors->has('idLibreria') ? ' is-invalid' : ''), 'placeholder' => 'Idlibreria']) }}
            {!! $errors->first('idLibreria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>