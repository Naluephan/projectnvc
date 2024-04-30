<?php


namespace App\Repositories\Impl;


use App\Models\SocialSecurity;
use App\Models\SocialSecurityInfo;
use App\Repositories\SocialSecurityFileInterface;
use Illuminate\Support\Collection;

class SocialSecurityFileRepository extends MasterRepository implements SocialSecurityFileInterface
{
    protected $model;

    public function __construct(SocialSecurityInfo $model)
    {
        parent::__construct($model);
    }

    public function getSocialSecurity($params)
    {
        return $this->model
        
        ->get();
    }

    public function findBy(array $criteria)
    {
        return SocialSecurity::where($criteria)->first();
    }
    public function getSocialSecurityByFilter($param)
    {
        return $this->model
        ->where(function ($q) use ($param) {
            if(isset($param['position_id'])) {
                $q->where('position_id', "=", $param['position_id']);
            }
            if(isset($param['company_id'])) {
                $q->where('company_id', "=", $param['company_id']);
            }
            if(isset($param['department_id'])) {
                $q->where('department_id', "=", $param['department_id']);
            }
        })
        ->with('emp.company')
        ->with('emp.position')
        ->with('emp.department')

        ->get();
    }
    // public function getAll($params = null): Collection
    // {

    //     return $this->model
    //     ->where('record_status', '=', 1)
    //         ->where(function ($q1) use ($params) {
    //             if (isset($params['company_id']) && $params['company_id'] >= 1) {
    //                 $q1->where('company_id', '=', $params['company_id']);
    //             } elseif (isset($param['company_id']) && $param['company_id'] == 0) {
    //                 $q1->Where('company_id', '=', 6);
    //             }
    //             if (isset($param['department_id']) && $param['department_id'] >= 1) {
    //                 $q1->Where('department_id', '=', $param['department_id']);
    //             }
    //             if (isset($param['position_id']) && $param['position_id'] >= 1) {
    //                 $q1->Where('position_id', '=', $param['position_id']);
    //             }
    //         })
    //         ->with('emp.company','emp.position','emp.department')
    //         ->get();
    // }
    
    public function getSocialSecurityById($id)
    {
        return $this->model->where('emp_id', $id)
        ->with('emp')
        ->get();
    }
}
