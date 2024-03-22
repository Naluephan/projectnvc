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
    public function getComAll()
    {
        return $this->model->get();
    }
    public function all(): Collection
    {
        return $this->model->where('record_status', '=', 1)
            ->get();
    }

    public function getAll($params = null): Collection
    {

        return $this->model
            ->where(function ($q) use ($params) {
                if (isset($params['searchValue'])) {
                    $q->where('new_detail', 'like', '%' . $params['searchValue'] . '%');
                }
                if (isset($params['id'])) {
                    $q->where('id', '-', $params['id']);
                }
                //                $q->whereHas('sdqDetails',function($q2) use ($params){
                //                    $q2->where();
                //                });
            })
            ->get();
    }
    public function paginate($params): Collection
    {
        return $this->model
            ->where(function ($q) use ($params) {
                if (isset($params['searchValue'])) {
                    $q->where('new_detail', 'like', '%' . $params['searchValue'] . '%');
                }
                if (isset($params['id'])) {
                    $q->where('id', '-', $params['id']);
                }
                //                $q->whereHas('sdqDetails',function($q2) use ($params){
                //                    $q2->where();
                //                });
            })
            ->select('*')
            ->skip($params['start'])
            ->take($params['rowperpage'])
            ->get();
    }

    public function findCompany($data)
    {
        return $this->model->where('name_th',$data)           
            ->orWhere('name_en', $data)
            ->orWhere('short_name', $data)
            ->exists();
    }

    public function existsWithFields(array $data)
    {
        $query = $this->model->query();
        
        foreach ($data as $field => $value) {
            $query->where($field, $value);
        }

        return $query->exists();
    }
    public function createCom(array $attributes)
    {
        return $this->model->create($attributes);
    }
    
}
