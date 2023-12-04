<?php


namespace App\Repositories\Impl;


use App\Repositories\MasterInterface;
use Illuminate\Support\Collection;

class MasterRepository extends BaseRepository implements MasterInterface
{
    public function all() : Collection {
        return $this->model->where('record_status','=',1)
            
            ->get();
    }

}
