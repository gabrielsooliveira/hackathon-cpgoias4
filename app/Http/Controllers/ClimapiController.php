<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ClimapiController extends Controller
{
    public function healthCheck()
    {
        $response = Http::withHeaders([
            'Authorization' => 'Bearer e2aa68ef-df9d-382a-af67-312ac626704a',
            'accept' => 'application/json'
        ])->get('https://api.cnptia.embrapa.br/climapi/v1/health');

        if ($response->successful()) {
            return response()->json($response->json());
        } else {
            return response()->json(['error' => 'Unable to reach the API'], 500);
        }
    }
}
