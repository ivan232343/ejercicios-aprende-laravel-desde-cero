<?php

use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Ejercicio 1

Route::get('/ejercicio1', function () {
    return "GET OK";
});

Route::post('/ejercicio1', function () {
    return "POST OK";
});
Route::post('/ejercicio3', function (Request $request) {
    $request->validate(
        [
            'name' => 'required|max:64|not_in:null',
            'description' => 'required|max:512|not_in:null',
            'price' => 'required|gt:0|not_in:null',
            'has_battery' => 'required|boolean',
            'battery_duration' => 'exclude_if:has_battery,false|numeric|gt:0',
            'colors' => 'required|not_in:null',
            'colors.*' => 'required|not_in:null|string',
            'dimensions' => 'not_in:null',
            'dimensions.width' => 'numeric|gt:0|',
            'dimensions.height' => 'numeric|gt:0|',
            'dimensions.length' => 'numeric|gt:0|',
            'accessories.*' => 'required|array|not_in:null',
            'accessories.*.name' => 'string|not_in:null',
            'accessories.*.price' => 'numeric|gt:0|'

    ]);
});