<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Categorie
 * 
 * @property int $id_categorie
 * @property string $libelle_categorie
 * 
 * @property Collection|Additif[] $additifs
 *
 * @package App\Models
 */
class Categorie extends Model
{
	protected $table = 'categorie';
	protected $primaryKey = 'id_categorie';
	public $timestamps = false;

	protected $fillable = [
		'libelle_categorie'
	];

	public function additifs()
	{
		return $this->hasMany(Additif::class, 'id_categorie');
	}
}
