<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface HolidayCategoryInterface extends BaseInterface
{
    public function getAll();
}

