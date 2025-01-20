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
use ApiPlatform\OpenApi\Model\Response;
use Illuminate\Database\Eloquent\Model;
use ApiPlatform\OpenApi\Model\Operation;
use ApiPlatform\OpenApi\Model\RequestBody;
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
            openapi: new Operation(
                summary: 'Make the sum of toxicite',
                responses: [
                    '200' => new Response(
                        description: 'Ok',
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                'type' => 'object',
                                'properties' => [
                                    'Résultat de l\'addition des points de toxicité' => [
                                        'type' => 'integer',
                                    ],
                                ],
                            ],
                            'example' => [
                                'Résultat de l\'addition des points de toxicité' => 15,
                            ],
                        ]
                    ])),
                    '201' => new Response(
                        description: 'Success'),
                ],
                description: '##  Make the sum of toxicite',
                requestBody: new RequestBody(
                    content: new \ArrayObject([
                        'application/json' => [
                            'schema' => [
                                'description' => 'the sum of toxicite',
                                'type' => 'object',
                                'properties' => [
                                    'idAdditif' => [
                                        'type' => 'array',
                                    ],
                                ],
                            ],
                            'example' => [
                                'idAdditif' => [1, 630, 499],
                            ],
                        ]
                    ])
                ),
            )
        ),
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
