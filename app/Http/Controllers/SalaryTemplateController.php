<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryTemplateController extends Controller
{
    public function list()
    {
        return view('salary_template.list_salary_template');
    }

    public function detailTemplateList()
    {
        return view('salary_template.list_salary_template_detail');
    }
}
