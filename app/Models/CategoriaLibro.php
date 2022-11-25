<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CategoriaLibro
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $idLibro
 * @property $idCategoria
 *
 * @property Categorium $categorium
 * @property Libro $libro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class CategoriaLibro extends Model
{
    public $table = "categoria_libro";
    
    static $rules = [
		'idLibro' => 'required',
		'idCategoria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idLibro','idCategoria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function categorium()
    {
        return $this->hasOne('App\Models\Categorium', 'id', 'idCategoria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\Libro', 'id', 'idLibro');
    }
    

}
