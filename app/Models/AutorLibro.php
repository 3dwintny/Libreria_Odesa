<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class AutorLibro
 *
 * @property $id
 * @property $created_at
 * @property $updated_at
 * @property $idLibro
 * @property $idAutor
 *
 * @property Autor $autor
 * @property Libro $libro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class AutorLibro extends Model
{
    
    static $rules = [
		'idLibro' => 'required',
		'idAutor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['idLibro','idAutor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function autor()
    {
        return $this->hasOne('App\Models\Autor', 'id', 'idAutor');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\Libro', 'id', 'idLibro');
    }
    

}
