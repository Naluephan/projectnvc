<?php


namespace App\Repositories\Impl;


use App\Models\Company;
use App\Repositories\CompanyInterface;
use Illuminate\Support\Collection;

class CompanyRepository extends MasterRepository implements CompanyInterface
{
    protected $model;

    public function __construct(Company $model)
    {
        parent::__construct($model);
    }

    public function all() : Collection {
        return $this->model->where('record_status','=',1)
            ->get();
    }

}
