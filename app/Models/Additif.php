<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Models\Toxicite;
use App\Models\Categorie;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\Put;
use ApiPlatform\Metadata\Post;
use ApiPlatform\Metadata\Delete;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GetCollection;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\AdditifController;

#[ApiResource(
    operations: [
        new Post(),
        new Get(),
        new Put(),
        new Delete(),
        new GetCollection(),
        new Get(uriTemplate: '/additifs/somme_toxicite'),
        new Post(
            uriTemplate: '/additifs/somme_toxicite',
            controller: AdditifController::class,
            name: 'somme_toxicite',
            )
    ]
)]
/**
 * Class Additif
 *
 * @property int $id_additifs
 * @property string $code_additifs
 * @property string $libelle_additifs
 * @property int $id_toxicite
 * @property int $id_categorie
 *
 * @property Categorie $categorie
 * @property Toxicite $toxicite
 *
 * @package App\Models
 */
class Additif extends Model
{
	protected $table = 'additifs';
	protected $primaryKey = 'id_additifs';
	public $timestamps = false;

	protected $casts = [
		'id_toxicite' => 'int',
		'id_categorie' => 'int'
	];

	protected $fillable = [
		'code_additifs',
		'libelle_additifs',
		'id_toxicite',
		'id_categorie'
	];

	public function categorie()
	{
		return $this->belongsTo(Categorie::class, 'id_categorie');
	}

	public function toxicite()
	{
		return $this->belongsTo(Toxicite::class, 'id_toxicite');
	}
}
