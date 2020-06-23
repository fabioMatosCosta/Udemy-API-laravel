<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Validation\Rules\Unique;
use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Support\Facades\Storage;

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

        if($request->hasFile('image') && $request->file('image')->isValid()){
            $extension = $request->image->extension();

            $name = uniqid(date('His'));

            $nameFile = `{$name}.{$extension}`;

            $upload = Image::make($dataForm['image'])->resize(177, 236)->save(storage_path(`app/public/clients/$nameFile`, 70));

            if(!$upload){
                return response()->json(['error'=>'Upload failed'], 500);
            }else{
                $dataForm['image'] = $nameFile; 
            }
        }

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
