<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SalaryTemplateDetailInterface extends BaseInterface
{
    public function paginate($param):Collection;
    public function getAll():Collection;
    public function checkListTemplateDetail($id);
    public function updateListTemplateDetail($data_update);
    public function getByTemplateId($id);
}

