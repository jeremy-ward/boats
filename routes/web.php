<?php

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

Route::get('/brands', 'PageController@boatList');

// Route::get('/boat/{id}', function($id){

// 	$boat = DB::table('boats')->where('id', $id)->get()[0];
// 	$type = $boat->type;
// 	$name = $boat->brand;
// 	$count = DB::table('boat_details')->select('boatCount')->where('boatId', $id)->orderby('created_at', 'desc')->first()->boatCount;

// 	return view('boat', ['name'=>$name, 'type'=>$type, 'count' => $count]);
// });

Route::get('/boat/{id}', ['uses' => 'PageController@viewBoat']);

Route::get('/check/{type}', ['uses' => 'BoatController@getBoatList']
);