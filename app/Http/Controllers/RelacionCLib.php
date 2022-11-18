<?php

namespace App\Http\Controllers;

use App\Models\Categorium;
use App\Models\Libro;
use Illuminate\Http\Request;
use Laravel\Ui\Presets\React;

class RelacionCLib extends Controller
{
    public function index()
    {
    }
    public function create(Request $request)
    {
        $valor1 = $request->input("select");
        //buscamos los libros con esa categoria
        $libros = Libro
            ::join("categoria_libro", "categoria_libro.idLibro", "=", "libro.id")
            ->join("categoria", "categoria_libro.idCategoria", "=", "categoria.id")
            ->where("categoria.id", "=", $valor1)
            ->get();

        $categorias = Categorium::all();

        return view('libro.catalogo', compact('libros', 'categorias'));
    }
}
