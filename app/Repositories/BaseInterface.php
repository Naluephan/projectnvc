<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface BaseInterface
{
    public function find($id): ?Model;
    public function create(array $data): Model;
    public function update($id,array $data): Model;
    public function delete($id);
    
    public function selectCustomData(?array $where = null, $whereRaw, ?array $rawFields = null, ?array $orderBy = null, ?array $groupBy = null, ?array $joinConditions = null, ?array $withRelations = null): ?Collection;
    public function deleteCustomData(?array $where = null, $whereRaw);
    public function updateCustomData(?array $where = null, $whereRaw, ?array $updateData = null);
}

