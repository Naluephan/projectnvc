<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;

interface EmployeeInterface extends BaseInterface
{
    public function saveExcel($excel);
    public function getUserProfile($empId);
    public function saveExcelUpdate($excel);
    public function getAll($param): Collection;
    public function paginate($param): Collection;

    public function findById($id);
    public function empLogin($param);

    public function getEmployeesByCompanyAndDepartment($param);
    public function savePinCode($param);

    public function profile_check_password($param);
    public function login_check_password($param);
}

