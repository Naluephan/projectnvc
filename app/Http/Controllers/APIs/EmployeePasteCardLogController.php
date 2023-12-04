<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Models\EmployeePasteCardLog;
use App\Repositories\EmployeePasteCardLogInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class EmployeePasteCardLogController extends Controller
{
    private $employeePasteCardLogRepository;
    public function __construct(EmployeePasteCardLogInterface $employeePasteCardLogRepository)
    {
        $this->employeePasteCardLogRepository = $employeePasteCardLogRepository;
    }
    
}
