<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Venda
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id_funcionario
 * @property int $id_cliente
 * 
 * @property Cliente $cliente
 * @property Funcionario $funcionario
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Venda extends Model
{
	protected $table = 'venda';

	protected $casts = [
		'id_funcionario' => 'int',
		'id_cliente' => 'int'
	];

	protected $fillable = [
		'id_funcionario',
		'id_cliente'
	];

	public function cliente()
	{
		return $this->belongsTo(Cliente::class, 'id_cliente');
	}

	public function funcionario()
	{
		return $this->belongsTo(Funcionario::class, 'id_funcionario');
	}

	public function pedidos()
	{
		return $this->belongsToMany(Pedido::class, 'venda_pedido', 'id_item', 'id_venda')
					->withPivot('id')
					->withTimestamps();
	}
}
