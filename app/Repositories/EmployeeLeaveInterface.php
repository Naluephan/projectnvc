<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmployeeLeaveInterface extends BaseInterface
{
   
    public function empLeave($param);
    public function saveEmpLeave($param);

}

