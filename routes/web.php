<?php

use App\Http\Controllers\front\PatientController;
use App\Http\Controllers\front\UserController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('patient/excel',[ReportController::class,'export']);

Route::middleware('guest')->group(function(){
    
});
Route::redirect('/','/home');

Route::middleware(['auth'])->group(function(){
    Route::view('/home','home');
    Route::get('/', function () {
        return view('welcome');
    });
    Route::prefix('dashboard')->name('dashboard.')->group(function (){
        
        Route::resource('patients',PatientController::class);
        Route::resource('users',UserController::class)->middleware('role:admin');
    });
});

