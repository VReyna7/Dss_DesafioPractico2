<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Carrito
 * 
 * @property int $idCliente
 * @property string $idProducto
 *
 * @package App\Models
 */
class Carrito extends Model
{
	protected $table = 'carrito';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'idCliente' => 'int'
	];

	protected $fillable = [
		'idCliente',
		'idProducto'
	];
}
