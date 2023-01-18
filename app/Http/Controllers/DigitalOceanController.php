<?php

namespace App\Http\Controllers;

use DigitalOceanV2\Client;
use Illuminate\Http\Request;

class DigitalOceanController extends Controller
{
    public function index()
    {
        $client = new Client();

        $client->authenticate('dop_v1_0a4571b42f2d441eefaeffade41580cd24a145119da896260f8ad91b12db5927');

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
