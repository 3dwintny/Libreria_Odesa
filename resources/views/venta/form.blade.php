
<hr>
<div class="form-group">
    <label for="Fecha">Fecha</label>
    <input type="date" class="form-control" name="fecha_hora_venta">

    <label for="Cliente">Cliente</label>
    <input type="text" class="form-control" name="nombre_cliente"
        value="{{isset($venta->nombre_cliente)?$venta->nombre_cliente:''}}">

    <label for="Nit">Nit</label>
    <input type="text" class="form-control" name="nit_cliente"
        value="{{isset($venta->nit_cliente)?$venta->nit_cliente:''}}">

    <label for="Direccion">Direccion</label>
    <input type="text" class="form-control" name="direccion" value="{{isset($venta->direccion)?$venta->direccion:''}}">
    <br>
    <hr>
    <button type="button" style="background-color:#d9b310;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Agergar libros
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Libros</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h1>Agregar libros</h1>
                    <label for="id">Id</label>
                    <input type="text" class="form-control" id="idin" disabled>
                    <label for="Titulo">Titulo</label>
                    <input type="text" class="form-control" id="tituloin" disabled>
                    <label for="Precio">Precio</label>
                    <input type="text" class="form-control" id="precioin" disabled>
                    <br>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table-light" id="tablibros">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>titulo</th>
                                    <th>Edicion</th>
                                    <th>Tomo</th>
                                    <th>Año</th>
                                    <th>Precio</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($libros as $libro)
                                <tr class="trlibro" data-libro="{{$libro->id}}" data-tiulo="{{$libro->titulo}}"
                                    data-precio="{{$libro->precioVenta}}">
                                    <td>{{$libro->id}}</td>
                                    <td>{{$libro->titulo}}</td>
                                    <td>{{$libro->edicion}}</td>
                                    <td>{{$libro->tomo}}</td>
                                    <td>{{$libro->anio}}</td>
                                    <td>{{$libro->precioVenta}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" style="background-color:#0b3c5d;" data-bs-dismiss="modal">Cerrar</button>
                    <input type="button" onclick="agregarlibro(),suma()" style="background-color:#d9b310;" value="Agregar libro" class="btn btn-success"
                        data-bs-dismiss="modal">
                </div>
            </div>
        </div>
    </div>
    <hr>
    <div>
        <h4>libros a vender</h4>
        <table class="table table-light" id="tabventa">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>titulo</th>
                    <th>Precio</th>
                    <th>cantidad</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
    <br>
    <hr>
    <label for="subtotal">subtotal</label>
    <input readonly type="text" id="sub" class="form-control" name="subtotal_venta"
        value="{{isset($venta->subtotal_venta)?$venta->subtotal_venta:''}}">

    <label for="descuento">descuento</label>
    <input type="text" id="des" oninput="suma()" class="form-control" name="descuento_total_sobre_venta"
        value="{{isset($venta->descuento_total_sobre_venta)?$venta->descuento_total_sobre_venta:''}}" placeholder="0">

    <label for="recargo">recargo</label>
    <input type="text" id="recargo" oninput="suma()" class="form-control" name="recargo_sobre_vemta"
        value="{{isset($venta->recargo_sobre_vemta)?$venta->recargo_sobre_vemta:''}}" placeholder="0">

    <label for="total">total</label>
    <input readonly type="text" id="tot" class="form-control" name="total_venta"
        value="{{isset($venta->total_venta)?$venta->total_venta:'' }}" placeholder="0">

</div>
<br>
<input type="submit" value="Guardar" class="btn btn-success" style="background-color:#0b3c5d;">
<a class="btn btn-primary" style="background-color:#d9b310;" href="{{url('venta/')}}">Regresar</a>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.5.0/js/dataTables.select.js"></script>
<script>

</script>
<script>
document.getElementById("des").value = 0;
document.getElementById("recargo").value = 0;

$(".trlibro").click(function(e) {
    e.preventDefault();
    var id = $(this).attr("data-libro");
    var titulo = $(this).attr("data-tiulo");
    var precio = $(this).attr("data-precio");


    document.getElementById("idin").value = id;
    document.getElementById("tituloin").value = titulo;
    document.getElementById("precioin").value = precio;

});
</script>
<script>
var sub = 0;
var total = 0;
var descuento = 0;
var recargo = 0;

function agregarlibro() {
    var precios = document.getElementById("precioin").value;
    var idlib = document.getElementById("idin").value;
    var titulolib = document.getElementById("tituloin").value;
    var preciolib = document.getElementById("precioin").value;
    var cantidad = 1;
    console.log(idlib);
    var fila = '<tr class="selected" id=""> <td><input readonly type="text" name="idlibro[]" value="' + idlib +
        '"></td> <td><input readonly class="form-control" type="text" value="' + titulolib +
        '" ></td> <td><input readonly name="precios[]"class="form-control" type="text" value="' + preciolib +
        '" ></td><td><input readonly name="cant[]"class="form-control" type="text" value="' + cantidad + '" ></td>  </tr>';
    sub = sub + parseFloat(precios);
    document.getElementById("sub").value = sub;
    $("#tabventa").append(fila);

}

function suma() {
    descuento = parseFloat(document.getElementById("des").value);
    recargo = parseFloat(document.getElementById("recargo").value);
    total = sub - descuento + recargo;
    document.getElementById("tot").value = total;
}
</script>