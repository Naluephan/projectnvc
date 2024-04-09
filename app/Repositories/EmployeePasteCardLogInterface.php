<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmployeePasteCardLogInterface extends BaseInterface
{
    // public function empPasteCardLog($param);
    public function empPasteCardLogApi($param) : Collection;
    public function workCount($param);
}

