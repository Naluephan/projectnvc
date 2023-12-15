<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function list()
    {
        $companies = Company::all();
        return view('department.list' , compact('companies'));
    }
}
