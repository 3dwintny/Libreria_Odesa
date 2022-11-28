<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RegistroVenta extends Model
{

    public $table = "registro_venta";

    use HasFactory;
    protected $fillable = ['idVenta','idLibro','cantidadLibros','subtotal','descuento','recargo','totalRegistro'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\Libro', 'id', 'idLibro');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    /* public function ventum()
    {
        return $this->hasOne('App\Models\Ventum', 'id', 'idVenta');
    } */
    public function registroVentas()
    {
        return $this->belongsTo('App\Models\Ventum');
    }

}
