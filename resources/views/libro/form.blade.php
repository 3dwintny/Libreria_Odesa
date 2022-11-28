<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            {{ Form::label('Codigo') }}
            {{ Form::text('id', $libro->id, ['class' => 'form-control' . ($errors->has('id') ? ' is-invalid' : ''), 'placeholder' => 'id']) }}
            {!! $errors->first('id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('TITULO') }}
            {{ Form::text('titulo', $libro->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('EDICION') }}
            {{ Form::number('edicion', $libro->edicion, ['class' => 'form-control' . ($errors->has('edicion') ? ' is-invalid' : ''), 'placeholder' => 'Edicion']) }}
            {!! $errors->first('edicion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('VOLUMEN') }}
            {{ Form::number('volumen', $libro->volumen, ['class' => 'form-control' . ($errors->has('volumen') ? ' is-invalid' : ''), 'placeholder' => 'Volumen']) }}
            {!! $errors->first('volumen', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('TOMO') }}
            {{ Form::number('tomo', $libro->tomo, ['class' => 'form-control' . ($errors->has('tomo') ? ' is-invalid' : ''), 'placeholder' => 'Tomo']) }}
            {!! $errors->first('tomo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('EDITORIAL') }}
            {{ Form::text('editorial', $libro->editorial, ['class' => 'form-control' . ($errors->has('editorial') ? ' is-invalid' : ''), 'placeholder' => 'Editorial']) }}
            {!! $errors->first('editorial', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('FOTOGRAFIA') }}
            <img src="{{ asset('uploads/libros/'.$libro->foto) }}" width="70px" height="70px" alt="Image">
            <input type="file" name="foto" class="form-control">
            {!! $errors->first('foto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('FECHA_FOTOGRAFIA') }}
            {{ Form::date('fecha_fotografia', $libro->fecha_fotografia, ['class' => 'form-control' . ($errors->has('fecha_fotografia') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fotografia']) }}
            {!! $errors->first('fecha_fotografia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('PAGINAS') }}
            {{ Form::number('paginas', $libro->paginas, ['class' => 'form-control' . ($errors->has('paginas') ? ' is-invalid' : ''), 'placeholder' => 'Paginas']) }}
            {!! $errors->first('paginas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ISBN') }}
            {{ Form::text('isbn', $libro->isbn, ['class' => 'form-control' . ($errors->has('isbn') ? ' is-invalid' : ''), 'placeholder' => 'Isbn']) }}
            {!! $errors->first('isbn', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('AÑO') }}
            {{ Form::text('anio', $libro->anio, ['class' => 'form-control' . ($errors->has('anio') ? ' is-invalid' : ''), 'placeholder' => 'Año']) }}
            {!! $errors->first('anio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('PRECIO COMPRA') }}
            {{ Form::text('precioCompra', $libro->precioCompra, ['class' => 'form-control' . ($errors->has('precioCompra') ? ' is-invalid' : ''), 'placeholder' => 'Precio Compra'])}}
            {!! $errors->first('precioCompra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('PRECIO VENTA') }}
            {{ Form::text('precioVenta', $libro->precioVenta, ['class' => 'form-control' . ($errors->has('precioVenta') ? ' is-invalid' : ''), 'placeholder' => 'Precio Venta'])}}
            {!! $errors->first('precioVenta', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('LIBRERIA') }}
            {{ Form::select('idLibreria',$librerias, $libro->idLibreria, ['class' => 'form-control' . ($errors->has('idLibreria') ? ' is-invalid' : ''), 'placeholder' => 'Libreria']) }}
            {!! $errors->first('idLibreria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary" style="background-color: #0b3c5d ;"">Aceptar</button>
    </div>
</div>
