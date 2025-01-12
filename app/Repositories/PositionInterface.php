<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PositionInterface extends BaseInterface
{
    public function paginate($param):Collection;
    public function getAll():Collection;
    public function all():Collection;
    public function deleteNotIn($ids,$department_id);
}

