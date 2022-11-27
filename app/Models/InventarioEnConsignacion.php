<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarioEnConsignacion
 *
 * @property $id
 * @property $id_libro
 * @property $cantidad_enviada
 * @property $fecha_ingreso
 * @property $created_at
 * @property $updated_at
 * @property $idDistribuidor
 *
 * @property Distribuidor $distribuidor
 * @property Libro $libro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InventarioEnConsignacion extends Model
{
<<<<<<< HEAD
    
=======

>>>>>>> 76422c3287087814d14d594c566fa8b024b323fd
    static $rules = [
		'id_libro' => 'required',
		'cantidad_enviada' => 'required',
		'fecha_ingreso' => 'required',
		'idDistribuidor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_libro','cantidad_enviada','fecha_ingreso','idDistribuidor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function distribuidor()
    {
        return $this->hasOne('App\Models\Distribuidor', 'id', 'idDistribuidor');
    }
<<<<<<< HEAD
    
=======

>>>>>>> 76422c3287087814d14d594c566fa8b024b323fd
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\Libro', 'id', 'id_libro');
    }
<<<<<<< HEAD
    
=======

>>>>>>> 76422c3287087814d14d594c566fa8b024b323fd

}
