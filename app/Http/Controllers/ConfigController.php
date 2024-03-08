<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function listAsset()
    {
        return view('list_asset_category');
    }
    public function listSupply()
    {
        return view('list_supply_category');
    }

    public function listPositionCleanline()
    {
        return view('list_position_cleanline');
    }
}
