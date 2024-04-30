<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface SocialSecurityFileInterface extends BaseInterface
{
    public function getSocialSecurity($params);
    public function findBy(array $criteria);
    public function getSocialSecurityById($id);
    // public function getAll($params = null): Collection;
    public function getSocialSecurityByFilter($param);


}
