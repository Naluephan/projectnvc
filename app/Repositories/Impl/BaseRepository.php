<?php


namespace App\Repositories\Impl;


use App\Repositories\BaseInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

class BaseRepository implements BaseInterface
{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id): ?Model
    {
        return $this->model->find($id);
    }

    public function create(array $data): Model
    {
        return $this->model->create($data);
    }

    public function update($id, array $data): Model
    {
        $obj = $this->model->find($id);
        $obj->update($data);
        return $obj;
    }

    public function delete($id)
    {
        return $this->model->find($id)->delete();
    }

    public function selectCustomData(?array $where = null, $whereRaw, ?array $rawFields = null, ?array $orderBy = null, ?array $groupBy = null, ?array $joinConditions = null, ?array $withRelations = null): ?Collection
    {

        $query = $this->model->where($where);
        // Add raw WHERE condition
        if ($whereRaw !== null) {
            $query->whereRaw($whereRaw);
        }
        // Add join conditions if provided
        if ($joinConditions !== null && is_array($joinConditions)) {
            foreach ($joinConditions as $joinTable => $joinCondition) {
                $query->join($joinTable, $joinCondition[0], $joinCondition[2]);
            }
        }

        // If $withRelations is provided, add the with clauses to the query
        if ($withRelations !== null && is_array($withRelations)) {
            $query->with($withRelations);
        }

        // If $rawFields is provided, add a selectRaw clause to the query
        if ($rawFields !== null && is_array($rawFields) && count($rawFields) > 0) {
            $query->selectRaw(implode(', ', $rawFields));
        }

        // If $orderBy is provided, add an orderBy clause to the query
        if ($orderBy !== null && is_array($orderBy) && count($orderBy) > 0) {
            foreach ($orderBy as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        }

        // If $groupBy is provided, add a groupBy clause to the query
        if ($groupBy !== null && is_array($groupBy) && count($groupBy) > 0) {
            $groupByRaw = implode(', ', $groupBy);
            $query->groupByRaw($groupByRaw);
        }

        return $query->get();
    }

    public function deleteCustomData(?array $where = null, $whereRaw)
    {
        $query = $this->model->where($where);

        // Add raw WHERE condition
        if ($whereRaw !== null) {
            $query->whereRaw($whereRaw);
        }

        return $query->delete();
    }

    public function updateCustomData(?array $where = null, $whereRaw, ?array $updateData = null)
    {
        $query = $this->model->where($where);

        // Add raw WHERE condition
        if ($whereRaw !== null) {
            $query->whereRaw($whereRaw);
        }

        // If $updateData is provided, add an update clause to the query
        if ($updateData !== null && is_array($updateData) && count($updateData) > 0) {
            $query->update($updateData);
        }

        return $query;
    }
}
