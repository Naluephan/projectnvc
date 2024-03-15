<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BuildingLocationController extends Controller
{
    public function listLocation()
    {
        return view('list_building_location');
    }
}
