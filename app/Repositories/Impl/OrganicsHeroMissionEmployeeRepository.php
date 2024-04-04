<?php


namespace App\Repositories\Impl;


use App\Models\OrganicsHeroMissionEmployee;
use App\Repositories\OrganicsHeroMissionEmployeeInterface;
use Illuminate\Support\Collection;

class OrganicsHeroMissionEmployeeRepository extends MasterRepository implements OrganicsHeroMissionEmployeeInterface
{
    protected $model;

    public function __construct(OrganicsHeroMissionEmployee $model)
    {
        parent::__construct($model);
    }

    public function getListMission($params)
    {
        $empId = $params['emp_id'];

        return $this->model->where('record_status', 1)
            ->where('emp_id', $empId)
            ->with([
                'organicsHeroMission' => function ($query) {
                    $query->select('*');
                },
                'organicsHeroMission.organicsHeroMissionType' => function ($query) {
                    $query->select('id', 'mission_type_name');
                },
                'organicsHeroMission.organicsHeroMissionCategory' => function ($query) {
                    $query->select('id', 'mission_category_name');
                }
            ])->get();
    }
}
