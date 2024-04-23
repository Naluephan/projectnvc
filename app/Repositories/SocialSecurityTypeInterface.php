<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SocialSecurityTypeInterface extends BaseInterface
{
    public function getSocial($params);
    public function findBy(array $criteria);
    public function getTypeById($id);
    // public function getAll($params = null): Collection;
    public function getSocialSecurityTypeByFilter($param);


}
