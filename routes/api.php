<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ContactController;

use App\Http\Controllers\Api\DevloperController;
use App\Http\Controllers\Api\PaymentController;
use App\Http\Controllers\Api\ExpenseController;
use App\Http\Controllers\Api\ModuleController;
use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\AttachmentController;
use App\Http\Controllers\Api\CommentController;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


// Route :: post ("add",[ProjectController::class,'add']);

Route::resource('v1/projects', ProjectController::class);

Route::resource('v1/clients', ClientController::class);

Route::resource('v1/contacts', ContactController::class);

Route::resource('v1/devlopers', DevloperController::class);
Route::resource('v1/payments', PaymentController::class);
Route::resource('v1/expenses', ExpenseController::class);
Route::resource('v1/modules', ModuleController::class);
Route::resource('v1/tasks', TaskController::class);
Route::resource('v1/attachments', AttachmentController::class);
Route::resource('v1/comments', CommentController::class);
