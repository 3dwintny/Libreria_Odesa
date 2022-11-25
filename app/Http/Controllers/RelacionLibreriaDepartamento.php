<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;

class RelacionLibreriaDepartamento extends Controller
{
    public function index(){
        $departamentos1 = Departamento::pluck('nombre','id');
        $departamento=new Departamento();
        return view('librerium.departamentoLibreria', compact('departamento','departamentos1'));
    }

}
