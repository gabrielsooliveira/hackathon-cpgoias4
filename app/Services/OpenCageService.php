<?php

namespace App\Services;

use App\Models\Address;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class OpenCageService
{
    protected $apiKey;

    public function __construct()
    {
        $this->apiKey = config('opencage.api_key');
    }
    public function getCoordinates($address)
    {
        $url = "http://api.positionstack.com/v1/forward?access_key={$this->apiKey}&query={$address}";
        $response = Http::get($url);

        // Verifica se a resposta da API foi bem-sucedida
        if ($response->successful()) {
            $data = $response->json();

            // Verifica se encontramos resultados
            if ($data['data'][0]) {
                // Tentar encontrar a cidade com o mesmo nome, latitude e longitude
                $address = Address::where('name', $data['data'][0]['name'])
                            ->where('lat', $data['data'][0]['latitude'])
                            ->where('lng', $data['data'][0]['longitude'])
                            ->first();

                // Se a cidade não for encontrada, cria um novo registro
                if (!$address) {
                    $address = Address::create([
                        "name" => $data['data'][0]['name'],
                        "lat" => $data['data'][0]['latitude'],
                        "lng" => $data['data'][0]['longitude'],
                    ]);
                }

                // Retorna o ID da cidade (seja existente ou nova)
                return $address->id;
            }
        }

        return null; // Caso não encontre resultados
    }
}
