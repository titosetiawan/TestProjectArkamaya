<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProjectController;
use App\Models\Project;
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
    return view('dashboard');
});

Route::get('/dashboard', function () {
    return view(
        'dashboard',[
        'project' => Project::get(),
    ]);
});

Route::get('dashboard', function () {
    return view('dashboard');
});

Route::resource('client', ClientController::class);
Route::resource('project', ProjectController::class);
