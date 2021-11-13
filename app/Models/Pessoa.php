<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pessoa
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $cpf
 * @property string $nome
 * 
 * @property Collection|Cliente[] $clientes
 * @property Collection|Funcionario[] $funcionarios
 *
 * @package App\Models
 */
class Pessoa extends Model
{
	protected $table = 'pessoa';

	protected $fillable = [
		'cpf',
		'nome'
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
