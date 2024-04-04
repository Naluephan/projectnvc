<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SavingMoneyInterface extends BaseInterface
{
    public function savingMoneyListApp($params);
    public function findAmountByEmpId($emp_id);
}

