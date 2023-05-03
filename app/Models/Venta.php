<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venta
 * 
 * @property int $id
 * @property string $idProducto
 * @property int $idCliente
 * @property int $cantidad
 * @property string|null $pdf
 * @property Carbon $fechaVenta
 *
 * @package App\Models
 */
class Venta extends Model
{
	protected $table = 'ventas';
	public $timestamps = false;

	protected $casts = [
		'idCliente' => 'int',
		'cantidad' => 'int',
		'fechaVenta' => 'datetime'
	];

	protected $fillable = [
		'idProducto',
		'idCliente',
		'cantidad',
		'pdf',
		'fechaVenta'
	];
}
