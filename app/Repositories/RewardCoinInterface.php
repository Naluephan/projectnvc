<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RewardCoinInterface extends BaseInterface
{
    public function rewardCoin($param);
    public function paginate($param):Collection;
    public function getAll():Collection;
}

