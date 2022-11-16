<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class InventarioLibrerium
 *
 * @property $id
 * @property $id_libro
 * @property $cantidad_stock
 * @property $created_at
 * @property $updated_at
 *
 * @property Libro $libro
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class InventarioLibrerium extends Model
{
    
    static $rules = [
		'id_libro' => 'required',
		'cantidad_stock' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['id_libro','cantidad_stock'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function libro()
    {
        return $this->hasOne('App\Models\Libro', 'id', 'id_libro');
    }
    

}
