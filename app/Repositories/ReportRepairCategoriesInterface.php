<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface ReportRepairCategoriesInterface extends BaseInterface
{
    public function getAll();
}

