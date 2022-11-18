<?php

namespace App\Http\Controllers;

use App\Models\CategoriaLibro;
use App\Models\Categorium;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create(Request $request)
    {
        $categoriaLibro = new CategoriaLibro();

        //obtenemos el id del libro
        $valor1 = $request->input("id");
        //buscamos en la DB el libro segun el id recibido
        $libros = DB::table('libro')->where('id', $valor1)->pluck('titulo','id');
        //cargamos todos los autores para que se muestren en la vista de create
        $categorias =Categorium::pluck('nombre_categoria','id');
        
        return view('categoria-libro.create', compact('categoriaLibro','libros','categorias'));
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

        $idLib= $categoriaLibro->idLibro;
        $libroC = Libro::find($idLib);

        $categoriaL= $categoriaLibro->idCategoria;
        $categoriaC = Categorium::find($categoriaL);


        return view('categoria-libro.show', compact('categoriaLibro', 'libroC', 'categoriaC'));
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
        $idLin = $categoriaLibro->idLibro;
        $libros = DB::table('libro')->where('id', $idLin)->pluck('titulo','id');
        $categorias = Categorium::pluck('nombre_categoria','id');

        return view('categoria-libro.edit', compact('categoriaLibro','libros','categorias'));
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
