<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryRequestSlipControlle extends Controller
{
    public function list()
    {
        return view('request_salary_slip.list_salary_request_slip');
    }
}
