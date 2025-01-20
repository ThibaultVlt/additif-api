<?php

namespace App\Http\Controllers;

use App\Models\Additif;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class AdditifController extends Controller
{
    public function sommeToxicite(Request $request): JsonResponse
    {
        $data = json_decode($request->getContent(), true);
        if (isset($data['idAdditif'])) {
            $idAdditif = $data['idAdditif'];
        } else {
            $idAdditif = [];
        }

    $additifs = Additif::whereIn('id_additifs', $idAdditif)
        ->with('toxicite') // Charger la relation toxicité
        ->get();

    // Calculer la somme des toxicités
    $sum = $additifs->sum(function ($additif) {
        return $additif->toxicite->point_toxicite ?? 0;
    });

    return new JsonResponse(['Résultat de l\'addition des points de toxicité' => $sum]);
    }
}
