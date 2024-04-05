<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ReserveFundInterface extends BaseInterface
{
    public function getReserveFund($params);
    public function findBy(array $criteria);
}
