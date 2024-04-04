<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface OrganicsHeroMissionEmployeeInterface extends BaseInterface
{
    public function getListMission($params);
}
