<?php

namespace App\Http\Controllers;

use App\Models\Distribuidor;
use Illuminate\Http\Request;

/**
 * Class DistribuidorController
 * @package App\Http\Controllers
 */
class DistribuidorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $distribuidors = Distribuidor::paginate();

        return view('distribuidor.index', compact('distribuidors'))
            ->with('i', (request()->input('page', 1) - 1) * $distribuidors->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $distribuidor = new Distribuidor();
        return view('distribuidor.create', compact('distribuidor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Distribuidor::$rules);

        $distribuidor = Distribuidor::create($request->all());

        return redirect()->route('distribuidors.index')
            ->with('success', 'Distribuidor created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $distribuidor = Distribuidor::find($id);

        return view('distribuidor.show', compact('distribuidor'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $distribuidor = Distribuidor::find($id);

        return view('distribuidor.edit', compact('distribuidor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Distribuidor $distribuidor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Distribuidor $distribuidor)
    {
        request()->validate(Distribuidor::$rules);

        $distribuidor->update($request->all());

        return redirect()->route('distribuidors.index')
            ->with('success', 'Distribuidor updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $distribuidor = Distribuidor::find($id)->delete();

        return redirect()->route('distribuidors.index')
            ->with('success', 'Distribuidor deleted successfully');
    }
}
