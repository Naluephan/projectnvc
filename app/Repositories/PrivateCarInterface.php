<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface PrivateCarInterface extends BaseInterface
{
    public function getPrivatecar($params);
    public function findBy(array $criteria);
}
