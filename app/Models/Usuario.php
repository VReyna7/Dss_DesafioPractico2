<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Http\Middleware\Authenticate;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Usuario
 * 
 * @property int $id
 * @property string $nombre
 * @property string $apellido
 * @property string $email
 * @property string $password
 * @property int $role
 * @property int|null $estado
 * @property string|null $remember_token
 *
 * @package App\Models
 */
class Usuario extends Authenticatable 
{
	protected $table = 'usuarios';
	public $timestamps = false;

	protected $casts = [
		'role' => 'int',
		'estado' => 'int'
	];

	protected $hidden = [
		'constrasena',
		'remember_token'
	];

	protected $fillable = [
		'nombre',
		'apellido',
		'email',
		'password',
		'role',
		'estado',
		'remember_token'
	];
}

