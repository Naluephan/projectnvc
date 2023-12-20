<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class TraningAndSemanirController extends Controller
{
    public function list()
    {
        return view('traing_and_seminar.list');
    }

    public function addEmployees($param)
    {
        $companies = Company::all();
        $departments = Department::select('id','name_th')->distinct()->get();
        return view('traing_and_seminar.add_employess', compact('companies','departments','param'));
    }
}
