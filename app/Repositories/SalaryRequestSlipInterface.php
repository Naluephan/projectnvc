<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SalaryRequestSlipInterface extends BaseInterface
{
    public function getAll($param): Collection;
    public function paginate($param): Collection;
}
