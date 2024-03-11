<?php


namespace App\Repositories\Impl;

use App\Models\NewsType;
use App\Repositories\NewsTypeInterface;
use Illuminate\Support\Collection;

class NewsTypeRepository extends BaseRepository implements NewsTypeInterface
{
    protected $model;

    public function __construct(NewsType $model)
    {
        parent::__construct($model);
    }


}
