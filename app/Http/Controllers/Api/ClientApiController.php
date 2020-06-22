<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;

class ClientApiController extends Controller
{
    public function __construct(Client $client, Request $request)
    {
        $this->client = $client;
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->client->all();
       
        return response()->json($data);
    }
}
