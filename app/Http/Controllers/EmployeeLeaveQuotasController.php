<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Repositories\EmployeeLeaveQuotasInterface;
use Illuminate\Http\Request;

class EmployeeLeaveQuotasController extends Controller
{
    private $employeeLeaveQuotasRepository;
    public function __construct(EmployeeLeaveQuotasInterface $employeeLeaveQuotasRepository)
    {
        $this->employeeLeaveQuotasRepository = $employeeLeaveQuotasRepository;
    }

    public function employeeLeaveQuotas(Request $request)
    {
        $data = $request->all();
        $leaveQuotas = $this->employeeLeaveQuotasRepository->employeeLeaveQuotas($data);
        return response()->json($leaveQuotas);
    }
}
