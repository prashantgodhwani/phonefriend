<?php

use Illuminate\Http\Request;
use \App\Http\Controllers\ApiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/store/filter-phones', 'HomeController@filterPhones');

Route::middleware('auth:api')->get('/user', function (Request $request) {
	return $request->user();
});

Route::get('v1/phonefriend/response', function (){
	return response()->json(['status'=>'SUCCESS','live'=>'0', 'url'=>'https://feel-eat.ch/app/home.php'], 201);
});
Route::get('/get-city-state/{pincode}', function ($pincode){
	$ch = curl_init();
	$headers = array(
		'Accept: application/json',
		'Content-Type: application/json',
	);
	curl_setopt($ch, CURLOPT_URL, 'http://postalpincode.in/api/pincode/'.$pincode);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$result = curl_exec($ch);
	return $result;
});
