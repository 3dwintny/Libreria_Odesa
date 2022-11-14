<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Municipio;
use Illuminate\Http\Request;

class RelacionLibreriaDepartamento extends Controller
{
    public function index(){
        //Llamamos a la vista que muestre los departamentos para seleccionar
//        $departamentos = Departamento::;
        $departamentos1 = Departamento::pluck('nombre','id');
        $departamento=new Departamento();
        return view('librerium.departamentoLibreria', compact('departamento','departamentos1'));
    }

}
