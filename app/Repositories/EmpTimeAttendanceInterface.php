<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmpTimeAttendanceInterface extends BaseInterface
{
    public function empTimeAttendance($param);
}

