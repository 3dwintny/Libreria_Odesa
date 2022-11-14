<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Librerium
 *
 * @property $id
 * @property $nombre_libreria
 * @property $telefono1
 * @property $telefono2
 * @property $direccion1
 * @property $id_municipio
 * @property $created_at
 * @property $updated_at
 *
 * @property Libro[] $libros
 * @property Municipio $municipio
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Librerium extends Model
{
    public $table = "libreria";
    
    static $rules = [
		'nombre_libreria' => 'required',
		'telefono1' => 'required',
		'telefono2' => 'required',
		'direccion1' => 'required',
		'id_municipio' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_libreria','telefono1','telefono2','direccion1','id_municipio'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libros()
    {
        return $this->hasMany('App\Models\Libro', 'idLibreria', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function municipio()
    {
        return $this->hasOne('App\Models\Municipio', 'id', 'id_municipio');
    }
    

}
