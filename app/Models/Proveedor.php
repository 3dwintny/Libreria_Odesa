<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    protected $table = "proveedor";
    protected $fillable = ['id','nombres','apellidos','telefono1','telefono2',	
    'correo','direccion','created_at','updated_at'];

    public function obtenerProveedoresById($id){
        return Proveedor::find($id);
    }
}
