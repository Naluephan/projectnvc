<?php


namespace App\Repositories\Impl;


use App\Models\PersonalInformation;
use App\Repositories\PersonalInformationInterface;
use Illuminate\Support\Collection;

class PersonalInformationRepository extends MasterRepository implements PersonalInformationInterface
{
    protected $model;

    public function __construct(PersonalInformation $model)
    {
        parent::__construct($model);
    }
    public function getAll(){
        return $this->model->get();
    }
}
