<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SocialSecurityTypeInterface extends BaseInterface
{
    public function getSocial($params);
    public function findBy(array $criteria);
}
