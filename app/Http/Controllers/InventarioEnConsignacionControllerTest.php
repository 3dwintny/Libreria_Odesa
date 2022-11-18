<?php

namespace App\Http\Controllers;

use App\Models\InventarioEnConsignacion;
use Illuminate\Http\Request;
use Tests\TestCase;
/**
 * Class InventarioEnConsignacionController
 * @package App\Http\Controllers
 */
class InventarioEnConsignacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarioEnConsignacion = InventarioEnConsignacion::paginate();
        
        return view('inventario-en-consignacion.index', compact('inventarioEnConsignacion'))
            ->with('i', (request()->input('page', 1) - 1) * $inventarioEnConsignacion->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventarioEnConsignacion = new InventarioEnConsignacion();
        return view('inventario-en-consignacion.create', compact('inventarioEnConsignacion'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InventarioEnConsignacion::$rules);

        $inventarioEnConsignacion = InventarioEnConsignacion::create($request->all());

        return redirect()->route('inventario-en-consignacion.index')
            ->with('success', 'InventarioEnConsignacion created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventarioEnConsignacion = InventarioEnConsignacion::find($id);

        return view('inventario-en-consignacion.show', compact('inventarioEnConsignacion'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventarioEnConsignacion = InventarioEnConsignacion::find($id);

        return view('inventario-en-consignacion.edit', compact('inventarioEnConsignacion'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InventarioEnConsignacion $inventarioEnConsignacion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarioEnConsignacion $inventarioEnConsignacion)
    {
        request()->validate(InventarioEnConsignacion::$rules);

        $inventarioEnConsignacion->update($request->all());

        return redirect()->route('inventario-en-consignacion.index')
            ->with('success', 'InventarioEnConsignacion updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inventarioEnConsignacion = InventarioEnConsignacion::find($id)->delete();

        return redirect()->route('inventario-en-consignacion.index')
            ->with('success', 'InventarioEnConsignacion deleted successfully');
    }
}
