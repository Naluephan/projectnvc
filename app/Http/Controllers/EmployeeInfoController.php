<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeInfoController extends Controller
{
    public function employeeInfo(){
        $now = Carbon::now();
        return view('info.employee',compact('now'));
    }
}
