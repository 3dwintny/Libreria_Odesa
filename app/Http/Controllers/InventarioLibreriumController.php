<?php

namespace App\Http\Controllers;

use App\Models\InventarioLibrerium;
use Illuminate\Http\Request;

/**
 * Class InventarioLibreriumController
 * @package App\Http\Controllers
 */
class InventarioLibreriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarioLibreria = InventarioLibrerium::paginate();

        return view('inventario.index', compact('inventarioLibreria'))
            ->with('i', (request()->input('page', 1) - 1) * $inventarioLibreria->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $inventarioLibrerium = new InventarioLibrerium();
        return view('inventario.create', compact('inventarioLibrerium'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(InventarioLibrerium::$rules);

        $inventarioLibrerium = InventarioLibrerium::create($request->all());

        return redirect()->route('inventario.index')
            ->with('success', 'InventarioLibrerium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $inventarioLibrerium = InventarioLibrerium::find($id);

        return view('inventario.show', compact('inventarioLibrerium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inventarioLibrerium = InventarioLibrerium::find($id);

        return view('inventario.edit', compact('inventarioLibrerium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  InventarioLibrerium $inventarioLibrerium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InventarioLibrerium $inventarioLibrerium)
    {
        request()->validate(InventarioLibrerium::$rules);

        $inventarioLibrerium->update($request->all());

        return redirect()->route('inventario.index')
            ->with('success', 'InventarioLibrerium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $inventarioLibrerium = InventarioLibrerium::find($id)->delete();

        return redirect()->route('inventario.index')
            ->with('success', 'InventarioLibrerium deleted successfully');
    }
}
