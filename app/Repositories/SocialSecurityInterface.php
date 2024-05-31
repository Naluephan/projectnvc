<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SocialSecurityInterface extends BaseInterface
{
    public function getSocialSecurity($params);
    public function findBy(array $criteria);
    public function getSocialSecurityByFilter($param);
    public function getSocialSecurityById($id = null): Collection;
    // public function getAll($params = null): Collection;


}
