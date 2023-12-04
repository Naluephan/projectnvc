<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface MasterInterface extends BaseInterface
{
    public function all(): Collection;
}

