<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class GeocodeController extends Controller
{
    // ...

    public function geocodeCityByUsername($username)
    {
        // Buscar usuario por su nombre de usuario
        $user = User::where('usuario', $username)->firstOrFail();
        $client = new Client();

        try {
            $response = $client->get("https://geocode.xyz/{$user->ciudad}?json=1&auth=14754692463148e15941295x122925");
            $data = json_decode($response->getBody()->getContents(), true);

            return response()->json($data);
        } catch (\GuzzleHttp\Exception\GuzzleException $e) {
            return response()->json(['error' => 'Error al conectar con Geocode.xyz: ' . $e->getMessage()], 500);
        }
    }
}

