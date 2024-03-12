<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConfigController extends Controller
{
    public function configMenu()
    {
        return view('setting_list');
    }
    public function configTools()
    {
        return view('setting.tools');
    }
    public function configAsset()
    {
        return view('setting.asset');
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
