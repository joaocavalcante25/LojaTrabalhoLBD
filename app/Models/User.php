<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * 
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string $cpf
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * 
 * @property Collection|Cliente[] $clientes
 * @property Collection|Funcionario[] $funcionarios
 *
 * @package App\Models
 */
class User extends Model
{
	protected $table = 'users';

	protected $dates = [
		'email_verified_at'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'name',
		'email',
		'cpf',
		'email_verified_at',
		'password',
		'remember_token'
	];

	public function clientes()
	{
		return $this->hasMany(Cliente::class, 'id_pessoa');
	}

	public function funcionarios()
	{
		return $this->hasMany(Funcionario::class, 'id_pessoa');
	}
}
