<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface CompanyInterface extends BaseInterface
{
    public function all(): Collection;
}

