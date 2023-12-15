<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function list()
    {
        $companies = Company::all();
        $departments = Department::select('id','name_th')->distinct()->get();
        return view('position.list', compact('companies','departments'));
    }
}
