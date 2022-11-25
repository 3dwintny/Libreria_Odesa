<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompraLibro;
use App\Models\RegistroCompra;
use App\Models\Proveedor;
use App\Models\Libro;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;

class CompraLibroController extends Controller
{
    protected $cp;
    public function __construct(CompraLibro $cp){
        $this->cp = $cp;  
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compras = RegistroCompra::with('libro','compra_libro')->get();
        $encabezado = CompraLibro::all();
        return view('compra_libro.list',compact('compras','encabezado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $hoy = Carbon::now()->format('Y-m-d');
        $libros = Libro::all()->sortBy('titulo');
        $proveedores = Proveedor::all();
        return view('compra_libro.create',['proveedores' => $proveedores,
        'libros' => $libros,
        'hoy' => $hoy ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = CompraLibro::create($request->all());
        foreach ($request->libro_id as $key => $producto){
            $results[] =  array(
                "libro_id" => $request->libro_id[$key],
                "cantidadLibros" => $request->cantidadLibros[$key],
                "precioCompraLibro" => $request->precioCompraLibro[$key]);
        }
        $compra->registro_compras()->createMany($results);
        return redirect()->route('registrar-compras-libros.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detalle = RegistroCompra::where('compra_libro_id', $id)->get();
        $subtotal = array();
        if(count($detalle)>0){
            $compras = $this->cp->obtenerComprasById($id);
            foreach($detalle as $item){
                array_push($subtotal,($item->cantidadLibros)*($item->precioCompraLibro));
            }
            return view('compra_libro.show',['compras' => $compras,'detalle'=>$detalle,'subtotal'=>$subtotal]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function buscarFecha(Request $request){
        $inicio = $request->inicial;
        $fin = $request->final;
        $compras = RegistroCompra::with('libro','compra_libro')->get();
        $encabezado = CompraLibro::whereBetween('fecha_hora', [$inicio,$fin])->get();
        if(count($encabezado)>0){
            return view('compra_libro.fecha',compact('compras','encabezado'));
        }
        else{
            return view('compra_libro.sinresultados');
        }
    }

    public function buscarProveedor(Request $r){
        $compras = RegistroCompra::with('libro','compra_libro')->get();
        $encabezado = CompraLibro::all();
        $nombres = $r->nombres;
        $apellidos = $r->apellidos;
        $hallarApellido = array();
        $hallarNombre = array();
        $hallarCompleto = array();
        if($nombres==""){
            $hallarApellido = Proveedor::where('apellidos','LIKE',"%{$apellidos}%")->get();
        }
        else if($apellidos==""){
            $hallarNombre = Proveedor::where('nombres','LIKE',"%{$nombres}%" )->get();
        }
        else{
            $hallarCompleto = Proveedor::where('nombres',$nombres)
            ->where('apellidos',$apellidos)
            ->get();
        }
        $control = 0;
        $almacenar = array(); 
        if(count($hallarCompleto)>0){
            foreach($encabezado as $item){
                if($item->proveedor_id == $hallarCompleto[0]->id)
                {
                    $control = $item->proveedor_id;
                }
            }

            if($control!=0){
                $encabezado = CompraLibro::where('proveedor_id',$control)->get();
                return view('compra_libro.proveedor',compact('compras','encabezado'));
            }
        }
        else if(count($hallarNombre)>0){
            foreach($encabezado as $item){
                foreach($hallarNombre as $n){
                    if($item->proveedor_id == $n->id)
                    {
                        array_push($almacenar,$item);
                    }
                }
            }
            $encabezado = $almacenar;
            return view('compra_libro.proveedor',compact('compras','encabezado'));
        }
        else if(count($hallarApellido)>0){
            foreach($encabezado as $item){
                foreach($hallarApellido as $a){
                    if($item->proveedor_id == $a->id)
                    {
                        array_push($almacenar,$item);
                    }
                }
            }
            $encabezado = $almacenar;
            return view('compra_libro.proveedor',compact('compras','encabezado'));
        }
        else{
            return view('compra_libro.sinresultados');
        }
    }
}
