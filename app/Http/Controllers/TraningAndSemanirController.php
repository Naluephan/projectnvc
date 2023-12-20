<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraningAndSemanirController extends Controller
{
    public function list()
    {
        return view('traing_and_seminar.list');
    }
}
