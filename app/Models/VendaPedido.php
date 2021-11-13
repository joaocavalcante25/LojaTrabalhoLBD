<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class VendaPedido
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $id_venda
 * @property int $id_item
 * 
 * @property Venda $venda
 * @property Pedido $pedido
 *
 * @package App\Models
 */
class VendaPedido extends Model
{
	protected $table = 'venda_pedido';

	protected $casts = [
		'id_venda' => 'int',
		'id_item' => 'int'
	];

	protected $fillable = [
		'id_venda',
		'id_item'
	];

	public function venda()
	{
		return $this->belongsTo(Venda::class, 'id_item');
	}

	public function pedido()
	{
		return $this->belongsTo(Pedido::class, 'id_venda');
	}
}
