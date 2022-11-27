<?php

namespace App\Http\Controllers;

use App\Models\Ventum;
use App\Models\Libro;
use App\Models\RegistroVenta;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $datos['ventas']=Ventum::all();
        return view('venta.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        /* $libros['libros']=Libro::paginate(5); */
        $libros = Libro::get();
        return view('venta.create',compact('libros') );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        //$datosventa = request()-> except('_token');
        $datosventa= Ventum::create($request->all());
        //Venta::insert($datosventa);
        //return response()->json($datosventa);
        foreach ($request->idlibro as $key => $producto){
        $results[] =  array(
            "idLibro" => $request->idlibro[$key],
            "cantidadLibros" => $request->cant[$key],
            "subtotal" => $request->precios[$key]);
        }
        $datosventa->registroVentas()->createMany($results);
        return redirect('venta')->with('mensaje','Venta agregada con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ventum  $ventum
     * @return \Illuminate\Http\Response
     */
    public function show(Ventum $venta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ventum  $ventum
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $venta = Ventum::findOrFail($id);

        return view('venta.edit',compact('venta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ventum  $ventum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //
        $datosventa = request()-> except(['_token','_method']);
        Ventum::where('id','=',$id)->update($datosventa);
        $venta = Ventum::findOrFail($id); 
        
        return view('venta.edit',compact('venta'));
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ventum  $ventum
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Ventum::destroy($id);
        return redirect('venta')->with('mensaje','Empleado Borrado con exito');

    }
}
