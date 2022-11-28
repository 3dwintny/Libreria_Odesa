<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Ventum
 *
 * @property $id
 * @property $fecha_hora_venta
 * @property $nombre_cliente
 * @property $nit_cliente
 * @property $direccion
 * @property $subtotal_venta
 * @property $descuento_total_sobre_venta
 * @property $recargo_sobre_vemta
 * @property $total_venta
 * @property $created_at
 * @property $updated_at
 *
 * @property RegistroVentum[] $registroVentas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Ventum extends Model
{
  public $table = "venta";
    static $rules = [
		'fecha_hora_venta' => 'required',
		'nombre_cliente' => 'required',
		'nit_cliente' => 'required',
		'direccion' => 'required',
		'subtotal_venta' => 'required',
		'descuento_total_sobre_venta' => 'required',
		'recargo_sobre_vemta' => 'required',
		'total_venta' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['fecha_hora_venta','nombre_cliente','nit_cliente','direccion','subtotal_venta','descuento_total_sobre_venta','recargo_sobre_vemta','total_venta'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function registroVentas()
    {
        return $this->hasMany('App\Models\RegistroVenta');
    }


}
