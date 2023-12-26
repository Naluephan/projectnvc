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
    public function getEmployeesByTas($tas_id);
    public function updateStatusParticipate($emp_id,$tas_id,$check_box);
    public function updateStatusCert($emp_id,$tas_id,$check_box);
}

