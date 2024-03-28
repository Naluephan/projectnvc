<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface LocationInterface extends BaseInterface
{
    public function getLocation($id);
    public function getAll($params = null): Collection;
    public function paginate($params): Collection;
    public function all(): Collection;
    // public function createMultiple(array $data);

}
