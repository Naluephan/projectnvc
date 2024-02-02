<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SalaryTemplateInterface extends BaseInterface
{
    public function paginate($param):Collection;
    public function getAll():Collection;

}

