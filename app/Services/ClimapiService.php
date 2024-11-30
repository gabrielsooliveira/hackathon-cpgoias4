<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;

class ClimapiService
{
    protected $baseUrl;
    protected $consumerKey;
    protected $consumerSecret;

    public function __construct()
    {
        $this->baseUrl = config('climapi.base_url');
        $this->consumerKey = config('climapi.consumer_key');
        $this->consumerSecret = config('climapi.consumer_secret');
    }

    /**
     * Obter o token de acesso usando client_credentials.
     */
    public function getAccessToken()
    {
        // Verifica se o token já está em cache
        if (Cache::has('climapi_access_token')) {
            return Cache::get('climapi_access_token');
        }

        // Faz a solicitação para obter o token
        $response = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->consumerKey . ':' . $this->consumerSecret),
        ])->post($this->baseUrl . '/token', [
            'grant_type' => 'client_credentials',
        ]);

        if ($response->successful()) {
            $accessToken = $response->json()['access_token'];
            $expiresIn = $response->json()['expires_in'];

            // Armazena o token em cache pelo tempo de validade
            Cache::put('climapi_access_token', $accessToken, now()->addSeconds($expiresIn));

            return $accessToken;
        }

        throw new \Exception('Não foi possível obter o token de acesso.');
    }

    /**
     * Faz uma requisição GET para a API ClimAPI para obter os dados de umidade do solo.
     */
    public function getTempData($latitude, $longitude, $date)
    {
        $token = $this->getAccessToken();

        // Definir as variáveis de umidade do solo
        $variables = ['tmpsfc', 'sunsdsfc', 'tmax2m', 'tmin2m'];

        $tempData = [];

        // Loop através das variáveis de umidade do solo
        foreach ($variables as $variable) {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $token,
                'Accept' => 'application/json',
            ])->get("{$this->baseUrl}/climapi/v1/ncep-gfs/{$variable}/{$date}/{$longitude}/{$latitude}");

            if ($response->successful()) {
                $tempData[$variable] = $response->json();
            } else {
                // Em caso de erro, armazene o erro na resposta
                $tempData[$variable] = 'Erro ao obter dados: ' . $response->body();
            }
        }

        return $tempData;
    }

    /**
     * Faz uma requisição GET para a API ClimAPI.
     */
    public function getWeatherData()
    {
        $token = $this->getAccessToken();

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->get($this->baseUrl . '/climapi/v1/ncep-gfs');

        if ($response->successful()) {
            return $response->json();
        }

        throw new \Exception('Erro ao obter os dados climáticos: ' . $response->body());
    }
}
