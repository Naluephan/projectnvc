<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface NewsTopicCategoryInterface extends BaseInterface
{
    public function getAll();
}

