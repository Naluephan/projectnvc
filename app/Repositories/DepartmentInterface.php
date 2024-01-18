<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface DepartmentInterface extends BaseInterface
{
    public function paginate($param):Collection;
    public function getAll():Collection;
    public function getDepartmentInCompany($company_id);
    public function all() : Collection; 
}

