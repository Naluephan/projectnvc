<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface WithdrawReserveFundInterface extends BaseInterface
{
    // public function getReserveFund($params);
    public function getWithdraw($params);

    public function findBy(array $criteria);
    public function findAmountByEmpId($emp_id);

}
