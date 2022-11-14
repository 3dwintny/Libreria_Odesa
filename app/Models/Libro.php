<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Libro
 *
 * @property $id
 * @property $titulo
 * @property $edicion
 * @property $volumen
 * @property $tomo
 * @property $foto
 * @property $fecha_fotografia
 * @property $paginas
 * @property $isbn
 * @property $anio
 * @property $precioCompra
 * @property $precioVenta
 * @property $created_at
 * @property $updated_at
 * @property $idLibreria
 *
 * @property AutorLibro[] $autorLibros
 * @property CategoriaLibro[] $categoriaLibros
 * @property EditorialLibro[] $editorialLibros
 * @property InventarioEnConsignacion[] $inventarioEnConsignacions
 * @property InventarioLibrerium[] $inventarioLibrerias
 * @property Librerium $librerium
 * @property LibroConsignacion[] $libroConsignacions
 * @property RegistroCompra[] $registroCompras
 * @property RegistroVentum[] $registroVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Libro extends Model
{
    public $table = "libro";

    static $rules = [
		'titulo' => 'required',
		'edicion' => 'required',
		'idLibreria' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['titulo','edicion','volumen','tomo','foto','fecha_fotografia','paginas','isbn','anio','precioCompra','precioVenta','idLibreria'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function autorLibros()
    {
        return $this->hasMany('App\Models\AutorLibro', 'idLibro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categoriaLibros()
    {
        return $this->hasMany('App\Models\CategoriaLibro', 'idLibro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function editorialLibros()
    {
        return $this->hasMany('App\Models\EditorialLibro', 'id_libro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarioEnConsignacions()
    {
        return $this->hasMany('App\Models\InventarioEnConsignacion', 'id_libro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function inventarioLibrerias()
    {
        return $this->hasMany('App\Models\InventarioLibrerium', 'id_libro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function librerium()
    {
        return $this->hasOne('App\Models\Librerium', 'id', 'idLibreria');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function libroConsignacions()
    {
        return $this->hasMany('App\Models\LibroConsignacion', 'idLibro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registroCompras()
    {
        return $this->hasMany('App\Models\RegistroCompra', 'idLibro', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registroVentas()
    {
        return $this->hasMany('App\Models\RegistroVentum', 'idLibro', 'id');
    }
    

}
