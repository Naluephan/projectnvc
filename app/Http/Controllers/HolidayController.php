<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function list()
    {
        return view('holiday.list');
    }
}
