<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface TransactionHistoryInterface extends BaseInterface
{
    public function transactionListApp($params);
}

