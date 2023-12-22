<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface TasEmployeeInterface extends BaseInterface
{
    public function checkListEmployees($emp_id,$tas_id);
    public function updateListEmployees($emp_id,$tas_id,$data_update);
    public function paginate($param):Collection;
    public function getAll($param):Collection;
}

