<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Autor;
use App\Models\AutorLibro;
use App\Models\CategoriaLibro;
use App\Models\Librerium;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

/**
 * Class LibroController
 * @package App\Http\Controllers
 */
class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $libros = Libro::paginate();

        return view('libro.index', compact('libros'))
            ->with('i', (request()->input('page', 1) - 1) * $libros->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $libro = new Libro();
        $librerias = Librerium::pluck('nombre_libreria','id');

        return view('libro.create', compact('libro','librerias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Libro::$rules);
        //creamos el libro
        $libro = new Libro;
        $libro = Libro::create($request->all());

        if ($request->hasfile('foto')) {
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/libros/', $filename);
            $libro->foto = $filename;
            //echo $libro->foto;
            $libro->save();
        }
        return redirect()->route('libros.index')->with('success', 'Libro created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libro = Libro::find($id);
        $idLib= $libro->idLibreria;
        $libreria = Librerium::find($idLib);
    
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

                
            /* echo $a;
        echo "--------------------";
        foreach ($a as $an) {
            echo $an->id;
            echo $an->nombre_autor;
        }
*/

    return view('libro.show', compact('libro','a','c','libreria' ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libro = Libro::find($id);
        $librerias = Librerium::pluck('nombre_libreria','id');

        return view('libro.edit', compact('libro','librerias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Libro $libro
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Libro $libro)
    {
        request()->validate(Libro::$rules);
        $libro->update($request->all());

        if ($request->hasfile('foto')) {
            $destination = 'uploads/libros/' . $libro->foto;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('foto');
            $extention = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extention;
            $file->move('uploads/libros/', $filename);
            $libro->foto = $filename;
            $libro->save();
        }


        return redirect()->route('libros.index')
            ->with('success', 'Libro updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $libro = Libro::find($id)->delete();

        return redirect()->route('libros.index')
            ->with('success', 'Libro deleted successfully');
    }
}
