<?php


namespace App\Repositories\Impl;


use App\Models\SocialSecurity;
use App\Repositories\SocialSecurityTypeInterface;
use Illuminate\Support\Collection;

class SocialSecurityTypeRepository extends MasterRepository implements SocialSecurityTypeInterface
{
    protected $model;

    public function __construct(SocialSecurity $model)
    {
        parent::__construct($model);
    }

    public function getSocial($params)
    {
        return $this->model
            ->where('record_status', 1)
            // ->where('emp_id', $params['emp_id'])
            ->with('emp')
            ->get();
    }

    public function findBy(array $criteria)
    {
        return SocialSecurity::where($criteria)->first();
    }
}
