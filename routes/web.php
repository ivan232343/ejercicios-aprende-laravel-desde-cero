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
    $request->validate([
        'name' => 'required|max:64',
        'description' => 'required|max:512',
        'price' => 'required|min:0',
        'has_battery' => 'boolean',
        'battery_duration' => 'exclude_if:has_battery,false|min:0|integer|nullable',
        'colors' => 'required_array_keys',
        'dimensions.width' => 'min:0',
        'dimensions.height' => 'min:0',
        'dimensions.length' => 'min:0',
        'accessories.name' => 'string',
        'accessories.price' => 'numeric|min:0'

    ]);
});