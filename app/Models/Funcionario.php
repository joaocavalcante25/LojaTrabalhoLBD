<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Funcionario
 * 
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $data_trabalho
 * @property string $endereco
 * @property string $telefone
 * @property int $id_pessoa
 * 
 * @property Pessoa $pessoa
 * @property Collection|Venda[] $vendas
 *
 * @package App\Models
 */
class Funcionario extends Model
{
	protected $table = 'funcionario';

	protected $casts = [
		'id_pessoa' => 'int'
	];

	protected $dates = [
		'data_trabalho'
	];

	protected $fillable = [
		'data_trabalho',
		'endereco',
		'telefone',
		'id_pessoa'
	];

	public function pessoa()
	{
		return $this->belongsTo(Pessoa::class, 'id_pessoa');
	}

	public function vendas()
	{
		return $this->hasMany(Venda::class, 'id_funcionario');
	}
}
