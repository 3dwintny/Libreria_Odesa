<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class LibroConsignacion
 *
 * @property $id
 * @property $cantidad
 * @property $fecha_egreso
 * @property $idLibro
 * @property $idDistribuidor
 * @property $created_at
 * @property $updated_at
 *
 * @property Distribuidor $distribuidor
 * @property Libro $libro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class LibroConsignacion extends Model
{
    public $table = "libro_consignacion";
    
    static $rules = [
		'cantidad' => 'required',
		'fecha_egreso' => 'required',
		'idLibro' => 'required',
		'idDistribuidor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['cantidad','fecha_egreso','idLibro','idDistribuidor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function distribuidor()
    {
        return $this->hasOne('App\Models\Distribuidor', 'id', 'idDistribuidor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\Libro', 'id', 'idLibro');
    }
    

}
