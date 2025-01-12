<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface NewsNoticeInterface extends BaseInterface
{
    public function news_notice_employee_paginate($param);
    public function news_notice_employee_getAll($param);
    public function searchNewsById($params);
    public function getAll();
}
