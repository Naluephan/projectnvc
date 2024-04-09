<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface HolidayInterface extends BaseInterface
{
    public function paginate($param):Collection;
    public function getAll():Collection;
    public function findBy($holidayName);

    public function holidayCount($param);

}

