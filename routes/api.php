<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/public-event', function (Request $request) {
    $channelName = $request->post('channelName');
    $message = $request->post('message');
    broadcast(new PublicMessageEvent( $channelName, $message ));
})->middleware('throttle:60,1');
