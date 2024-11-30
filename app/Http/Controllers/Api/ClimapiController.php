<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\ClimapiService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClimapiController extends Controller
{
    protected $climapiService;

    public function __construct(ClimapiService $climapiService)
    {
        $this->climapiService = $climapiService;
    }

    public function healthCheck()
    {
        try {
            $data = $this->climapiService->getWeatherData();
            return response()->json($data);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function getTempData()
    {
        $user = Auth::user();

        try {
            $latitude = $user->address->lat;
            $longitude = $user->address->lng;
            $date = now()->format('Y-m-d');

            $tempData = $this->climapiService->getTempData($latitude, $longitude, $date);

            // Retorna os dados como resposta JSON
            return response()->json($tempData);

        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 400);
        }
    }
}
