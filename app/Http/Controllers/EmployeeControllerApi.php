<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeControllerApi extends Controller
{
    public function getEmployee(Request $request){
        return "Hello getEmployee Controller";
    }

    public function updateEmployee(Request $request){
        return "Updating current Employee Controller";
    }

    public function downloadEmployee(Request $request){
        return "Downloading Employee";
    }
}
