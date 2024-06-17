<?php

namespace App\Repositories\Impl;

use App\Models\Comment;
use App\Models\FlexibleSpecialHours;
use App\Repositories\FlexibleSpecialHoursInterface;
use Illuminate\Support\Collection;

class FlexibleSpecialHoursRepository extends MasterRepository implements FlexibleSpecialHoursInterface

{
    protected $model;
    public function __construct(FlexibleSpecialHours $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
