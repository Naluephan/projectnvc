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
        return view('traing_and_seminar.add_employees', compact('companies','departments','param'));
    }

    public function tasEmployeesDetail($param)
    {
        return view('traing_and_seminar.tas_detail', compact('param'));
    }

    public function tasEmployeesCheckName($param)
    {
        return view('traing_and_seminar.check_employees', compact('param'));
    }

    
}
