<?php


namespace App\Repositories\Impl;

use App\Models\Worktime;
use App\Repositories\WorktimeInterface;
use Illuminate\Support\Collection;

class WorktimeRepository extends MasterRepository implements WorktimeInterface
{
    protected $model;

    public function __construct(Worktime $model)
    {
        parent::__construct($model);
    }

    public function getAll(){
        return $this->model
        ->with('departments')
        ->get();
    }

}
