<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\AutorLibro;
use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create(Request $request)
    {
        //obtenemos el id del libro
        $valor1 = $request->input("id");
        //buscamos en la DB el libro segun el id recibido
        $libros = DB::table('libro')->where('id', $valor1)->pluck('titulo','id');
        //cargamos todos los autores para que se muestren en la vista de create
        $autores =Autor::pluck('nombre_autor','id');
        //creamos un nuevo autorLibro
        $autorLibro = new AutorLibro();

         return view('autor-libro.create', compact('autorLibro','libros','autores'));
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

        $idLib= $autorLibro->idLibro;
        $libroA = Libro::find($idLib);

        $autorL= $autorLibro->idAutor;
        $autorA = Autor::find($autorL);


        return view('autor-libro.show', compact('autorLibro', 'libroA', 'autorA'));
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
        $idLin = $autorLibro->idLibro;
        $libros = DB::table('libro')->where('id', $idLin)->pluck('titulo','id');
        $autores = Autor::pluck('nombre_autor','id');

        return view('autor-libro.edit', compact('autorLibro', 'libros', 'autores'));
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
