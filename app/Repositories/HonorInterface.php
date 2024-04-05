<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface HonorInterface extends BaseInterface
{
    public function getHonor($params);
    public function findBy(array $criteria);
}
