<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistroCompra extends Model
{
    use HasFactory;
    protected $table = "registro_compra";
    protected $fillable = ['id','compra_libro_id','libro_id','cantidadLibros',
    'precioCompraLibro','totalRegistro','created_at','updated_at'];

    public function compra_libro(){
        return $this->belongsTo('App\Models\CompraLibro');
    }

    public function libro(){
        return $this->belongsTo('App\Models\Libro');
    }
}
