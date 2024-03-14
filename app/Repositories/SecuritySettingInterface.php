<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SecuritySettingInterface extends BaseInterface
{
    public function getAll($param): Collection;
}

