<?php


namespace App\Repositories\Impl;


use App\Models\OrganicsHeroMissionType;
use App\Repositories\OrganicsHeroMissionTypeInterface;
use Illuminate\Support\Collection;

class OrganicsHeroMissionTypeRepository extends MasterRepository implements OrganicsHeroMissionTypeInterface
{
    protected $model;

    public function __construct(OrganicsHeroMissionType $model)
    {
        parent::__construct($model);
    }
}
