<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLibro;
use Illuminate\Http\Request;

/**
 * Class CategoriaLibroController
 * @package App\Http\Controllers
 */
class CategoriaLibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categoriaLibros = CategoriaLibro::paginate();

        return view('categoria-libro.index', compact('categoriaLibros'))
            ->with('i', (request()->input('page', 1) - 1) * $categoriaLibros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoriaLibro = new CategoriaLibro();
        return view('categoria-libro.create', compact('categoriaLibro'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(CategoriaLibro::$rules);

        $categoriaLibro = CategoriaLibro::create($request->all());

        return redirect()->route('categoria-libros.index')
            ->with('success', 'CategoriaLibro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categoriaLibro = CategoriaLibro::find($id);

        return view('categoria-libro.show', compact('categoriaLibro'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriaLibro = CategoriaLibro::find($id);

        return view('categoria-libro.edit', compact('categoriaLibro'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  CategoriaLibro $categoriaLibro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CategoriaLibro $categoriaLibro)
    {
        request()->validate(CategoriaLibro::$rules);

        $categoriaLibro->update($request->all());

        return redirect()->route('categoria-libros.index')
            ->with('success', 'CategoriaLibro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $categoriaLibro = CategoriaLibro::find($id)->delete();

        return redirect()->route('categoria-libros.index')
            ->with('success', 'CategoriaLibro deleted successfully');
    }
}
