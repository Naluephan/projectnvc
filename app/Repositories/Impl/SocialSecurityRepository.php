<?php


namespace App\Repositories\Impl;


use App\Models\SocialSecurity;
use App\Repositories\SocialSecurityInterface;
use Illuminate\Support\Collection;

class SocialSecurityRepository extends MasterRepository implements SocialSecurityInterface
{
    protected $model;

    public function __construct(SocialSecurity $model)
    {
        parent::__construct($model);
    }

    public function getSocialSecurity($params)
    {
        return $this->model
            ->where('record_status', 1)
            // ->where('emp_id', $params['emp_id'])
     
            ->with('emp','socialsecurity.socialdetail')
            ->get();
    }

    public function findBy(array $criteria)
    {
        return SocialSecurity::where($criteria)->first();
    }
}
