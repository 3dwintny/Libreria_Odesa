<?php

namespace App\Http\Controllers;

use App\Models\AutorLibro;
use App\Models\CategoriaLibro;
use App\Models\Categorium;
use App\Models\Librerium;
use App\Models\Libro;
use Illuminate\Http\Request;

class RelacionCALib extends Controller
{
    public function index()
    {
        $libros = Libro::paginate();
        $categorias = Categorium::all();

        return view('libro.catalogo', compact('libros', 'categorias'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }
    public function show($id)
    {
        $libro = Libro::find($id);
        $a = AutorLibro::select(
            "autor.nombre_autor",
            "autor_libro.id"
        )
            ->join('autor', 'autor.id', '=', 'autor_libro.idAutor')
            ->where('autor_libro.idLibro', '=', $id)
            ->get();
        $c = CategoriaLibro::select(
            "categoria.nombre_categoria",
            "categoria_libro.id"
        )
            ->join('categoria', 'categoria.id', '=', 'categoria_libro.idCategoria')
            ->where('categoria_libro.idLibro', '=', $id)
            ->get();
        return view('catalogo.show', compact('libro', 'a', 'c'));
            }

}
