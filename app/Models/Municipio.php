<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Class Municipio
 *
 * @property $id
 * @property $nombre
 * @property $idDepartamento
 * @property $created_at
 * @property $updated_at
 *
 * @property Departamento $departamento
 * @property Librerium[] $librerias
 * @property Persona[] $personas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Municipio extends Model
{
    public $table = "municipio";
    
    static $rules = [
		'nombre' => 'required',
		'idDepartamento' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','idDepartamento'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function departamento()
    {
        return $this->hasOne('App\Models\Departamento', 'id', 'idDepartamento');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function librerias()
    {
        return $this->hasMany('App\Models\Librerium', 'id_municipio', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function personas()
    {
        return $this->hasMany('App\Models\Persona', 'idMunicipio', 'id');
    }
    
}
