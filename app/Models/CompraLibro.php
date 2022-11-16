<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompraLibro extends Model
{
    use HasFactory;
    protected $table = "compra_libro";
    protected $fillable = ['id','proveedor_id','fecha_hora','total_compra',
    'created_at','updated_at'];

    public function proveedor(){
        return $this->belongsTo('App\Models\Proveedor');
    }
}
