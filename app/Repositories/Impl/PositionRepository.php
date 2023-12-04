<?php


namespace App\Repositories\Impl;


use App\Models\Position;
use App\Repositories\PositionInterface;
use Illuminate\Support\Collection;

class PositionRepository extends MasterRepository implements PositionInterface
{
    protected $model;

    public function __construct(Position $model)
    {
        parent::__construct($model);
    }

   
}
