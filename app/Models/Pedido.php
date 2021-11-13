<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Pedido
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $qtd_vendida
 * @property int $id_produto
 * 
 * @property Produto $produto
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class Pedido extends Model
{
	protected $table = 'pedido';

	protected $casts = [
		'qtd_vendida' => 'int',
		'id_produto' => 'int'
	];

	protected $fillable = [
		'qtd_vendida',
		'id_produto'
	];

	public function produto()
	{
		return $this->belongsTo(Produto::class, 'id_produto');
	}

	public function vendas()
	{
		return $this->belongsToMany(Venda::class, 'venda_pedido', 'id_venda', 'id_item')
					->withPivot('id')
					->withTimestamps();
	}
}
