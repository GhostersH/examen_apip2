<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class UserController extends Controller
{
    public function geocodeUser($userId)
    {
        $user = User::find($userId);
        $client = new Client();
        $response = $client->get("https://geocode.xyz/{$user->ciudad}?json=1");
        $data = json_decode($response->getBody());
        
        return response()->json([
            'usuario' => $user->usuario,
            'ciudad' => $user->ciudad,
            'georeferencia' => $data
        ]);
    }
}
