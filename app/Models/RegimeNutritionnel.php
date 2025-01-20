<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class RegimeNutritionnel
 * 
 * @property int $id_regime_nutritionnel
 * @property string $libelle_regime_nutritionnel
 * @property string $logo_regime
 *
 * @package App\Models
 */
class RegimeNutritionnel extends Model
{
	protected $table = 'regime_nutritionnel';
	protected $primaryKey = 'id_regime_nutritionnel';
	public $timestamps = false;

	protected $fillable = [
		'libelle_regime_nutritionnel',
		'logo_regime'
	];
}
