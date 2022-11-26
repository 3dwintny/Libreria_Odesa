@extends('layouts.app')

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Crear Compras'])
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Registrar compras') }}
                        </span>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
                <div class="card-body">
                    <div class="table-responsive">
                        <form method="POST" enctype="multipart/form-data" role="form"
                            action="{{route('registrar-compras-libros.store')}}">
                            @csrf
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <label class="form-label">Fecha de Compra</label>
                                <input type="date" class="date" name="fecha_hora" id="fecha_hora" value="{{$hoy}}">
                            </div>
                            <label class="form-label">Proveedor</label>
                            <select name="proveedor_id" id="proveedor_id" class="form-select" required>
                                <option selected disabled value="">Proveedor</option>
                                @foreach ($proveedores as $item)
                                <option value="{{$item->id}}">{{$item->nombres}} {{$item->apellidos}}</option>
                                @endforeach
                            </select>
                            <br>
                            <h2>Ingresar Producto</h2>
                            <div class="row g-3 align-items-center">
                                <div class="col-auto">
                                    <label class="col-form-label">Libro</label>
                                </div>
                                <div class="col-auto">
                                    <select name="libro_id" id="libro_id" class="form-select">
                                        @foreach($libros as $item)
                                        <option value="{{$item->id}}">{{$item->titulo}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-auto">
                                    <label class="col-form-label">Cantidad</label>
                                </div>
                                <div class="col-auto">
                                    <input type="number" id="cantidadLibros" name="cantidadLibros" class="form-control"
                                        value="1">
                                </div>
                                <div class="col-auto">
                                    <label class="col-form-label">Precio</label>
                                </div>
                                <div class="col-auto">
                                    <input type="text" id="precioCompraLibro" name="precioCompraLibro"
                                        class="form-control" placeholder="Precio de Compra">
                                </div>
                                <div class="col-auto">
                                    <button type="button" class="btn" style="background-color: #328CC1;
                        font-weight:bolder; color:#ffff;" id="agregar" name="agregar">
                                        Agregar Producto
                                    </button>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <h4 class="card-title">Detalles de Compra</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped" id="detalleCompra">
                                        <thead>
                                            <tr>
                                                <th>Eliminar</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>SubTotal</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th colspan="4">
                                                    <p align="right">TOTAL:</p>
                                                </th>
                                                <th>
                                                    <p><span id="total_compra" name="total_compra">Q 0.00 </span>
                                                        <input type="hidden" name="total_compra" id="total">
                                                    </p>
                                                </th>
                                            </tr>
                                        </tfoot>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                            <button onclick="guardarCompra" type="submit" class="btn btn-primary mb-3"
                                id="guardar">Guardar</button>
                            <button type="submit" onclick="window.location='{{ url('registrar-compras-libros') }}'"
                                class="btn btn-danger mb-3" data-bs-toggle="button">Cancelar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
$(document).ready(function() {
    $("#agregar").click(function() {
        agregar();
    });
});

var cont = 0;
total_compra = 0;
subtotal = [];

$("#guardar").hide();

function agregar() {
    libro_id = $("#libro_id").val();
    libro = $("#libro_id option:selected").text();
    cantidadLibros = $("#cantidadLibros").val();
    precioCompraLibro = $("#precioCompraLibro").val();
    totalRegistro = 0;

    if (libro_id != "" && cantidadLibros != "" && cantidadLibros > 0 && precioCompraLibro != "") {
        subtotal[cont] = cantidadLibros * precioCompraLibro;
        total_compra = total_compra + subtotal[cont];
        var fila = '<tr class="selected" id="fila' + cont +
            '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont +
            ');">X</button></td> <td><input type="hidden" name="libro_id[]" value="' + libro_id + '">' + libro +
            '</td> <td><input type="hidden" id="precioCompraLibro[]" name="precioCompraLibro[]" value="' +
            precioCompraLibro + '"> <input class="form-control" type="number" id="precioCompraLibro[]" value="' +
            precioCompraLibro + '" disabled></td> <td><input type="hidden" name="cantidadLibros[]" value="' +
            cantidadLibros + '"><input class="form-control" type="number" value="' + cantidadLibros +
            '" disabled></td> <td align="right">Q' + subtotal[cont] + ' </td></tr>';
        cont++;
        limpiar();
        totales();
        evaluar();
        $("#detalleCompra").append(fila);
    } else {
        alert('Campos Vacíos');
    }
}

function limpiar() {
    $("#cantidadLibros").val("1");
    $("#precioCompraLibro").val("");
}

function totales() {
    $("#total_compra").html("Q " + total_compra.toFixed(2));
    $("#total").val(total_compra.toFixed(2))
}
proveedor_id = $("#proveedor_id").val();

function evaluar() {
    if (total_compra > 0) {
        $("#guardar").show();
    } else {
        $("#guardar").hide();
    }
}

function eliminar(index) {
    total_compra = total_compra - subtotal[index];
    $("#total_compra").html("Q" + total_compra);
    $("#fila" + index).remove();
    evaluar();
}
</script>
@endsection
