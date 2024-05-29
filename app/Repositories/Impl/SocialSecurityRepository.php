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
        $query = $this->model->query();

        if (isset($params['emp_id'])) {
            $query->where('emp_id', $params['emp_id']);
        }

        if (isset($params['company_id'])) {
            $query->where('company_id', $params['company_id']);
        }

        if (isset($params['department_id'])) {
            $query->where('department_id', $params['department_id']);
        }
        if (isset($params['position_id'])) {
            $query->where('position_id', $params['position_id']);
        }
        $query->where('approve_status', 2)->with([
            'company' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'department' => function ($query) {
                $query->select('id', 'name_th', 'name_en');
            },
            'position' => function ($query) {
                $query->select('id', 'name_th');
            },
        ]);
        $query->where('approve_status', 2)->with('socialsecurity.socialdetail.socialfile');
       return $query->get();
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
        ->with('socialsecurity.socialdetail.socialfile')
        ->get();
    }
}
