<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeControllerApi;
use App\Http\Middleware\TestPylonBasicAuth;

Route::middleware(TestPylonBasicAuth::class)->group(function () {
    // Define your routes here

    Route::get('/employees/csv', [EmployeeControllerApi::class, 'downloadEmployee']);
    Route::get('/employees', [EmployeeControllerApi::class, 'listEmployee']);
    Route::get('/employees/{id}', [EmployeeControllerApi::class, 'getEmployee']);
    Route::patch('/employees/{id}', [EmployeeControllerApi::class, 'updateEmployee']);

});
