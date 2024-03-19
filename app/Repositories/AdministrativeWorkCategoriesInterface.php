<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface AdministrativeWorkCategoriesInterface extends BaseInterface
{
    public function getAll();
    public function findByAdminist($administName);

}

