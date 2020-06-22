<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('clients', 'Api\ClientApiController@index');
