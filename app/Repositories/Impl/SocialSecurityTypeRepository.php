<?php


namespace App\Repositories\Impl;


// use App\Models\SocialSecurity;
use App\Models\SocialSecurityType;
use App\Repositories\SocialSecurityTypeInterface;
use Illuminate\Support\Collection;

class SocialSecurityTypeRepository extends MasterRepository implements SocialSecurityTypeInterface
{
    protected $model;

    public function __construct(SocialSecurityType $model)
    {
        parent::__construct($model);
    }

    public function getSocial($params)
    {
        return $this->model
            ->where('record_status', 1)
            // ->where('emp_id', $params['emp_id'])
            ->with('socialdetail')
            ->get();
    }

    public function findBy(array $criteria)
    {
        return SocialSecurityType::where($criteria)->first();
    }
}
