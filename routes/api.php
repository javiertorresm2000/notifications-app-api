<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\NotificationTypeController;
use App\Http\Controllers\UserController;
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

Route::get('/categories', [CategoryController::class, 'list']);
Route::get('/notification_types', [NotificationTypeController::class, 'list']);
Route::get('/users', [UserController::class, 'list']);

Route::get('/notifications', [NotificationController::class, 'list']);
Route::post('/notifications/{category}', [NotificationController::class, 'addNotifications']);
