<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface RewardCoinHistoryInterface extends BaseInterface
{
    public function getAll();
    public function findBy($params);
}
