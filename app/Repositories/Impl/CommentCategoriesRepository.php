<?php

namespace App\Repositories\Impl;

use App\Models\Comment;
use App\Models\CommentCategories;
use App\Repositories\CommentCategoriesInterface;
use Illuminate\Support\Collection;

class CommentCategoriesRepository extends MasterRepository implements CommentCategoriesInterface

{
    protected $model;
    public function __construct(CommentCategories $model)
    {
        parent::__construct($model);
    }
    public function getAll()
    {
        return $this->model->get();
    }
}
