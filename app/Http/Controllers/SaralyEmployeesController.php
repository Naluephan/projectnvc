<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SaralyEmployeesController extends Controller
{
    public function list()
    {
        return view('salary.list');
    }
}
