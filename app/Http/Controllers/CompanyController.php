<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function list()
    {
        return view('companies.list');
    }
    public function companyCreate()
    {
        return view('companies.create');
    }
}
