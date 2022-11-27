<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Librerium;
use App\Models\Municipio;
use Illuminate\Http\Request;

/**
 * Class LibreriumController
 * @package App\Http\Controllers
 */
class LibreriumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libreria = Librerium::paginate();

        return view('librerium.index', compact('libreria'))
            ->with('i', (request()->input('page', 1) - 1) * $libreria->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Departamento $id)
    {

        $municipios = Municipio::all();

        $librerium = new Librerium();
        return view('librerium.create', compact('librerium',  'municipios'));
    }

    public function departamento()
    {

        return redirect()->route('libreria.create')
            ->with('success', 'Librerium created successfully.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Librerium::$rules);

        $librerium = Librerium::create($request->all());

        return redirect()->route('libreria.index')
            ->with('success', 'Librerium created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $librerium = Librerium::find($id);

        return view('librerium.show', compact('librerium'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $librerium = Librerium::find($id);

        return view('librerium.edit', compact('librerium'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Librerium $librerium
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Librerium $librerium)
    {
        request()->validate(Librerium::$rules);

        $librerium->update($request->all());

        return redirect()->route('libreria.index')
            ->with('success', 'Librerium updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $librerium = Librerium::find($id)->delete();

        return redirect()->route('libreria.index')
            ->with('success', 'Librerium deleted successfully');
    }
}
