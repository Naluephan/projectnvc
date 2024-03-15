<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BuildingLocationInterface extends BaseInterface
{
    public function getAll();
}

