<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyInterface;
use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $companyRepository;
    private $employeeRepository;
    public function __construct(
        CompanyInterface $companyRepository,
        EmployeeInterface $employeeRepository
    ) 
    {
        $this->middleware('auth');
        $this->companyRepository = $companyRepository;
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function empList()
    {
        $companies = $this->companyRepository->all();
        return view('employees.list', compact('companies'));
    }

    function empDetail($id)
    {
        $emp = $this->employeeRepository->findById($id);
        return view('employees.emp_detail', compact('emp'));
    }
}
