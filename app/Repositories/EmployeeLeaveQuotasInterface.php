<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmployeeLeaveQuotasInterface extends BaseInterface
{
    public function employeeLeaveQuotas($data);
}
