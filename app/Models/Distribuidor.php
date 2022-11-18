<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Distribuidor
 *
 * @property $id
 * @property $nombres
 * @property $apellidos
 * @property $telefono
 * @property $telefono1
 * @property $correo
 * @property $direccion
 * @property $created_at
 * @property $updated_at
 *
 * @property InventarioEnConsignacion[] $inventarioEnConsignacions
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Distribuidor extends Model
{
  public $table = "distribuidor"; 
    
    static $rules = [
		'nombres' => 'required',
		'apellidos' => 'required',
		'telefono' => 'required',
		'telefono1' => 'required',
		'correo' => 'required',
		'direccion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombres','apellidos','telefono','telefono1','correo','direccion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarioEnConsignacions()
    {
        return $this->hasMany('App\Models\InventarioEnConsignacion', 'idDistribuidor', 'id');
    }
    

}
