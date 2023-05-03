<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Producto
 * 
 * @property string $codigoProducto
 * @property string $nombre
 * @property string $descripcion
 * @property string|null $img
 * @property int $categoria
 * @property int $precio
 * @property int $existencias
 *
 * @package App\Models
 */
class Producto extends Model
{
	protected $table = 'productos';
	protected $primaryKey = 'codigoProducto';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'categoria' => 'int',
		'precio' => 'int',
		'existencias' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'img',
		'categoria',
		'precio',
		'existencias'
	];
}
