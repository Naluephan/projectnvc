<?php


namespace App\Repositories\Impl;


use App\Models\OrganicsHeroMission;
use App\Repositories\OrganicsHeroMissionInterface;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OrganicsHeroMissionRepository extends MasterRepository implements OrganicsHeroMissionInterface
{
    protected $model;

    public function __construct(OrganicsHeroMission $model)
    {
        parent::__construct($model);
    }
}
