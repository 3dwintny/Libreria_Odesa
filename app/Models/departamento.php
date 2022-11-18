<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Departamento
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Municipio[] $municipios
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Departamento extends Model
{
  public $table = "departamento";
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function municipios()
    {
        return $this->hasMany('App\Models\Municipio', 'idDepartamento', 'id');
    }
    
    public function obtenerDepartamentos()
    {
        return Departamento::all();
    }
    public function obtenerDepartamentosPorId($id)
    {
        return Departamento::find($id);
    }

    public function obtenerDepartamentoPorId($id)
    {
        return Departamento::find($id);
    }

}
