<?php


namespace App\Repositories\Impl;


use App\Models\SupplyCategory;
use App\Repositories\TransactionRequestInterface;
use Illuminate\Support\Collection;

class TransactionRequestRepository extends MasterRepository implements TransactionRequestInterface
{
    protected $model;

    public function __construct(SupplyCategory $model)
    {
        parent::__construct($model);
    }
}
