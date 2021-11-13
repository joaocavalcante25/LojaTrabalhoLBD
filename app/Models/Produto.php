<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Produto
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string $nome
 * @property float $preco
 * @property int $qtd_estoque
 * @property int $tamanho
 * 
 * @property Collection|Pedido[] $pedidos
 *
 * @package App\Models
 */
class Produto extends Model
{
	protected $table = 'produto';

	protected $casts = [
		'preco' => 'float',
		'qtd_estoque' => 'int',
		'tamanho' => 'int'
	];

	protected $fillable = [
		'nome',
		'preco',
		'qtd_estoque',
		'tamanho'
	];

	public function pedidos()
	{
		return $this->hasMany(Pedido::class, 'id_produto');
	}
}
