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
                if (isset($params['department_id']) && $params['department_id'] >= 1) {
                    $q1->where('department_id', '=', $params['department_id']);
                }
            })
            ->with('department', 'company')
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
                if (isset($params['department_id']) && $params['department_id'] >= 1) {
                    $q1->where('department_id', '=', $params['department_id']);
                }
            })
            ->with('department', 'company')
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }

    public function all(): Collection
    {
        return $this->model
            ->get();
    }
    public function deleteNotIn($ids, $department_id)
    {
        $query = $this->model->where('department_id', $department_id);
    
        if ($ids !== null) {
            $query->whereNotIn('id', $ids);
        }
    
        return $query->update(['record_status' => 0]);
    }    
}
