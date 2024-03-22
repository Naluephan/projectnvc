<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface LocationInterface extends BaseInterface
{
    public function getLocation($id);
    public function createMultiple(array $data);

}
