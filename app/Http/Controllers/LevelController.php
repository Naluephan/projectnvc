<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Department;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function list()
    {
        $companies = Company::all();
        return view('level.list', compact('companies'));
    }
}
