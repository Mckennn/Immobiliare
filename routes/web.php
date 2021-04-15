<?php

use Illuminate\Support\Facades\DB;
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
    return view('home');
});

Route::get('/a-propos', function () {
    $name = 'Lucas';

    return view('about', [
        'name' => $name,
        'bibis' => [1, 2, 3, 4],
    ]);
});

Route::get('/hello/{name?}', function ($name = 'Mckenn') {
    return "<h1>Hello $name</h1>";
})->where('name', '.{2,}'); // Le nom doit faire au minimum 2 caractères

// Afficher les annonces
Route::get('/nos-annonces', function () {

    $properties = DB::select('select * from properties where sold = :sold', [
        'sold' => 0,
    ]);
    // Si on ne veut plus écrire de SQL...
    $properties = DB::table('properties')
        ->where('sold', 0)->where('sold', '=', 1, 'or')->get();
    // WHERE sold = 0 OR sold = 1

    return view('properties/index', [
        'properties' => $properties,
    ]);
});
