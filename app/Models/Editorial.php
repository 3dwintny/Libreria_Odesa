<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Editorial
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property EditorialLibro[] $editorialLibros
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Editorial extends Model
{
  public $table = "editorial";

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
  public function editorialLibros()
  {
    return $this->hasMany('App\Models\EditorialLibro', 'id_Editorial', 'id');
  }
}
