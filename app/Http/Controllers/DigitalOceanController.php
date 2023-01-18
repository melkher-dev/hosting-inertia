<?php

namespace App\Http\Controllers;

use DigitalOceanV2\Client;
use Illuminate\Http\Request;

class DigitalOceanController extends Controller
{
    public function index()
    {
        $client = new Client();

        $client->authenticate(config('token.digital_token'));

        // return the size api
        $size = $client->size();

        // return a collection of Size entity
        $sizes = $size->getAll();

        // return the region api
        $region = $client->region();

        // return a collection of Region entity
        $regions = $region->getAll();
        return inertia('Servers/Servers', [
            'sizes' => $sizes,
            'regions' => $regions
        ]);
    }
}
