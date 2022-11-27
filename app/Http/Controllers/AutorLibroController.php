<?php

namespace App\Http\Controllers;

use App\Models\AutorLibro;
use Illuminate\Http\Request;

/**
 * Class AutorLibroController
 * @package App\Http\Controllers
 */
class AutorLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $autorLibros = AutorLibro::paginate();

        return view('autor-libro.index', compact('autorLibros'))
            ->with('i', (request()->input('page', 1) - 1) * $autorLibros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $autorLibro = new AutorLibro();
        return view('autor-libro.create', compact('autorLibro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AutorLibro::$rules);

        $autorLibro = AutorLibro::create($request->all());

        return redirect()->route('autor-libros.index')
            ->with('success', 'AutorLibro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $autorLibro = AutorLibro::find($id);

        return view('autor-libro.show', compact('autorLibro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $autorLibro = AutorLibro::find($id);

        return view('autor-libro.edit', compact('autorLibro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AutorLibro $autorLibro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AutorLibro $autorLibro)
    {
        request()->validate(AutorLibro::$rules);

        $autorLibro->update($request->all());

        return redirect()->route('autor-libros.index')
            ->with('success', 'AutorLibro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $autorLibro = AutorLibro::find($id)->delete();

        return redirect()->route('autor-libros.index')
            ->with('success', 'AutorLibro deleted successfully');
    }
}
