<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface WorktimeInterface extends BaseInterface
{
    public function getAll();
    public function findByDepartmentName($department_id);

}

