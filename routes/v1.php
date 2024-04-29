<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeControllerApi;
use App\Http\Middleware\TestPylonBasicAuth;

Route::middleware(TestPylonBasicAuth::class)->group(function () {
    // Define your routes here

    Route::get('/employee', [EmployeeControllerApi::class, 'getEmployee']);//->middleware('auth:sanctum');
    Route::put('/employee', [EmployeeControllerApi::class, 'updateEmployee']);//->middleware('auth:sanctum');
    Route::put('/employee', [EmployeeControllerApi::class, 'downloadAllEmployee']);//->middleware('auth:sanctum');

});
