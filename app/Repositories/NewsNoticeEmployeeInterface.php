<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface NewsNoticeEmployeeInterface extends BaseInterface
{
    public function getAll($params);
}
