<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Autor
 *
 * @property $id
 * @property $nombre_autor
 * @property $created_at
 * @property $updated_at
 *
 * @property AutorLibro[] $autorLibros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Autor extends Model
{
  public $table = "autor";

    
    static $rules = [
		'nombre_autor' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre_autor'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function autorLibros()
    {
        return $this->hasMany('App\Models\AutorLibro', 'idAutor', 'id');
    }
    

}
