<?php

use App\Http\Controllers\api\inventarisController;
use Illuminate\Support\Facades\Route;

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

Route::get('/inventaris/{code}', [inventarisController::class, 'show']);
Route::post('/inventaris/update', [inventarisController::class, 'update']);