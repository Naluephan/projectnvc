<?php


namespace App\Repositories\Impl;


use App\Models\OrganicsHeroMissionCategory;
use App\Repositories\OrganicsHeroMissionCategoryInterface;
use Illuminate\Support\Collection;

class OrganicsHeroMissionCategoryRepository extends MasterRepository implements OrganicsHeroMissionCategoryInterface
{
    protected $model;

    public function __construct(OrganicsHeroMissionCategory $model)
    {
        parent::__construct($model);
    }
}
