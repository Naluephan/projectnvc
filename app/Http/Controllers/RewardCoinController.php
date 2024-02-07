<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RewardCoinController extends Controller
{
    public function list()
    {
        return view('reward_coin.list');
    }
}
