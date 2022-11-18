<?php

namespace App\Http\Controllers;

use App\Models\Distribuidor;
use App\Models\Libro;
use App\Models\LibroConsignacion;
use Illuminate\Http\Request;

/**
 * Class LibroConsignacionController
 * @package App\Http\Controllers
 */
class LibroConsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libroConsignacions = LibroConsignacion::paginate();

        return view('libro-consignacion.index', compact('libroConsignacions'))
            ->with('i', (request()->input('page', 1) - 1) * $libroConsignacions->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libroConsignacion = new LibroConsignacion();
        $libros = Libro::pluck('titulo','id');
        $distribuidores = Distribuidor::pluck('nombres','id');

        return view('libro-consignacion.create', compact('libroConsignacion','libros', 'distribuidores'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(LibroConsignacion::$rules);

        $libroConsignacion = LibroConsignacion::create($request->all());

        return redirect()->route('libro-consignacions.index')
            ->with('success', 'LibroConsignacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libroConsignacion = LibroConsignacion::find($id);
        $libros = Libro::pluck('titulo','id');
        $distribuidores = Distribuidor::pluck('nombres','id');

        return view('libro-consignacion.show', compact('libroConsignacion','libros', 'distribuidores'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libroConsignacion = LibroConsignacion::find($id);
        $libros = Libro::pluck('titulo','id');
        $distribuidores = Distribuidor::pluck('nombres','id');

        return view('libro-consignacion.edit', compact('libroConsignacion','libros', 'distribuidores'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  LibroConsignacion $libroConsignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LibroConsignacion $libroConsignacion)
    {
        request()->validate(LibroConsignacion::$rules);

        $libroConsignacion->update($request->all());

        return redirect()->route('libro-consignacions.index')
            ->with('success', 'LibroConsignacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $libroConsignacion = LibroConsignacion::find($id)->delete();

        return redirect()->route('libro-consignacions.index')
            ->with('success', 'LibroConsignacion deleted successfully');
    }
}
