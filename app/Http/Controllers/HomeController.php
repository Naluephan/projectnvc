<?php

namespace App\Http\Controllers;

use App\Repositories\CompanyInterface;
use App\Repositories\DepartmentInterface;
use App\Repositories\EmployeeInterface;
use App\Repositories\PositionInterface;
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
    private $departmentRepository;
    private $positionRepository;
    public function __construct(
        CompanyInterface $companyRepository,
        EmployeeInterface $employeeRepository,
        DepartmentInterface $departmentRepository,
        PositionInterface $positionRepository
    ) 
    {
        $this->middleware('auth');
        $this->companyRepository = $companyRepository;
        $this->employeeRepository = $employeeRepository;
        $this->departmentRepository = $departmentRepository;
        $this->positionRepository = $positionRepository;
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
        $departments = $this->departmentRepository->all();
        $positions = $this->positionRepository->all();
        return view('employees.list', compact('companies','departments','positions'));
    }

    function empDetail($id)
    {
        $emp = $this->employeeRepository->findById($id);
        return view('employees.emp_detail', compact('emp'));
    }
}
