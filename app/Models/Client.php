<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'name', 'image', 'cpf_cnpj',
    ];

    public function rules()
    {
        return[
            'name' => 'required',
            'image' => 'image',
            'cpf_cnpj' => 'required|unique:clients'
        ];
    }
}
