<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface FlexibleSpecialHoursInterface extends BaseInterface
{
    public function getAll();
    // public function getCategoriesName();
}

