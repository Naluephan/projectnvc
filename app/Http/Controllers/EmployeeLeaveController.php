<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeeLeaveController extends Controller
{
    public function list()
    {
        return view('leave.list');
    }
}
