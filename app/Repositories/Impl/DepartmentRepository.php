<?php


namespace App\Repositories\Impl;


use App\Models\Department;
use App\Repositories\DepartmentInterface;
use Illuminate\Support\Collection;

class DepartmentRepository extends MasterRepository implements DepartmentInterface
{
    protected $model;

    public function __construct(Department $model)
    {
        parent::__construct($model);
    }

    public function getAll($params = null): Collection
    {

        return $this->model
            ->where(function ($q) use ($params) {
                if (isset($params['searchValue'])) {
                    $q->where('name_th', 'like', '%' . $params['searchValue'] . '%');
                    $q->orWhere('name_en', 'like', '%' . $params['searchValue'] . '%');
                }
            })
            ->where(function ($q1) use ($params) {
                if (isset($params['company_id']) && $params['company_id'] >= 1) {
                    $q1->where('company_id', '=', $params['company_id']);
                }
                if (isset($params['record_status'])) {
                    $q1->where('record_status', '=', 1);
                }
            })
            ->with('company')
            ->get();
    }
    public function paginate($params): Collection
    {
        return $this->model
            ->where(function ($q) use ($params) {
                if (isset($params['searchValue'])) {
                    $q->where('name_th', 'like', '%' . $params['searchValue'] . '%');
                    $q->orWhere('name_en', 'like', '%' . $params['searchValue'] . '%');
                }
            })
            ->where(function ($q1) use ($params) {
                if (isset($params['company_id']) && $params['company_id'] >= 1) {
                    $q1->where('company_id', '=', $params['company_id']);
                }
            })
            ->with('company')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }

    public function getDepartmentInCompany($company_id)
    {
        return $this->model
            ->where('company_id', '=', $company_id)
            ->get();
    }

    public function all(): Collection
    {
        return $this->model
            ->get();
    }

    public function findBy($params)
    {
        return $this->model->with('position')
            ->where(function ($q) use ($params) {
                if (isset($params['id'])) {
                    $q->where('id', '=', $params['id']);
                }
                if (isset($params['name_th'])) {
                    $q->where('name_th', '=', $params['name_th']);
                }
                if (isset($params['company_id'])) {
                    $q->where('company_id', '=', $params['company_id']);
                }
            })
            ->first();
    }

    public function showDetailById($params)
    {
        return $this->model
            ->where('id', $params['id'])
            ->with('pickupTools.pickupToolsDeviceType')
            ->withCount('pickupTools')
            ->first();
    }
}
