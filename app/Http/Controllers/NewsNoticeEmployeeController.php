<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsNoticeEmployeeController extends Controller
{
    public function news_notice_employee()
    {
        return view('news_notice_employee.news_notice_employee');
    }
}
