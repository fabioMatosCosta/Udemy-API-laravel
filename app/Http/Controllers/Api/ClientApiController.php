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


    public function store(Request $request)
    {
        $this->validate($request, $this->client->rules());

        $dataForm = $request->all();
        
        $data = $this->client->create($dataForm);

        return response()->json($data, 201);
    }

 
    public function show($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
