<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Specifier
 * 
 * @property int $id_additifs
 * @property int $id_regime_nutritionnel
 *
 * @package App\Models
 */
class Specifier extends Model
{
	protected $table = 'specifier';
	public $incrementing = false;
	public $timestamps = false;

	protected $casts = [
		'id_additifs' => 'int',
		'id_regime_nutritionnel' => 'int'
	];
}
