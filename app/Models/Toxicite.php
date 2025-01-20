<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Toxicite
 * 
 * @property int $id_toxicite
 * @property string $niveau_toxicite
 * @property int $point_toxicite
 * 
 * @property Collection|Additif[] $additifs
 *
 * @package App\Models
 */
class Toxicite extends Model
{
	protected $table = 'toxicite';
	protected $primaryKey = 'id_toxicite';
	public $timestamps = false;

	protected $casts = [
		'point_toxicite' => 'int'
	];

	protected $fillable = [
		'niveau_toxicite',
		'point_toxicite'
	];

	public function additifs()
	{
		return $this->hasMany(Additif::class, 'id_toxicite');
	}
}
