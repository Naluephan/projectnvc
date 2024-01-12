<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalaryTemplateDetailController extends Controller
{
    public function list()
    {
        return view('salary_template.list_salary_template_detail');
    }

    public function add()
    {
        return view('salary_template.add_salary_template_detail');
    }
}
