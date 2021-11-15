<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cliente
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon $data_cadastro
 * @property int $id_pessoa
 * 
 * @property User $user
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class Cliente extends Model
{
	protected $table = 'cliente';

	protected $casts = [
		'id_pessoa' => 'int'
	];

	protected $dates = [
		'data_cadastro'
	];

	protected $fillable = [
		'data_cadastro',
		'id_pessoa'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'id_pessoa');
	}

	public function vendas()
	{
		return $this->hasMany(Venda::class, 'id_cliente');
	}
}
