<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\PublisherController;


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

Route::post('subscribe/{topic}/', [SubscriberController::class, 'subscribeTopic']);
Route::post('publish/{topic}/', [PublisherController::class, 'publishTopic']);
