<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface GroupInsuranceInterface extends BaseInterface
{
    public function getGroupInsurance($params);
    public function findBy(array $criteria);
    public function getInsuranceById($id);
    public function getGroupInsuranceByFilter($param);


}
