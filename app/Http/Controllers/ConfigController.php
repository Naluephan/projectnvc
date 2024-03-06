<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function listAsset()
    {
        return view('list_asset_category');
    }
}
