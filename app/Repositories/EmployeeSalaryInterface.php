<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmployeeSalaryInterface extends BaseInterface
{
    public function employeeSalary($param);
}

