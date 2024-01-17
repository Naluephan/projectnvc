<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(
    [
        'prefix' => 'v1', 'as' => 'api.v1.',
        //        'middleware' => [ 'auth', ],
    ],
    function () {

        Route::group(['middleware' => 'auth:sanctum'], function () {
            //test metohd
            Route::post('/test/numbers', function () {
                return response()->json([1, 2, 3, 4, 5]);
            })->name('test.number');

            

            Route::post('/companies', [\App\Http\Controllers\APIs\CompanyController::class, 'getCompanies'])->name('companies');
            Route::post('/employee/paste/card', [\App\Http\Controllers\APIs\EmployeePasteCardController::class, 'pasteCard'])->name('employee.paste.card');
        });
        Route::post('create/employee/paste/card', [\App\Http\Controllers\APIs\EmployeePasteCardLogController::class, 'pasteCardLogCreate'])->name('create.paste.card.log');
//      Company
        Route::post('/companies/list', [\App\Http\Controllers\APIs\CompanyController::class, 'getAll'])->name('companies.list');
        Route::post('/companies/create', [\App\Http\Controllers\APIs\CompanyController::class, 'create'])->name('companies.create');
        Route::post('/companies/update', [\App\Http\Controllers\APIs\CompanyController::class, 'update'])->name('companies.update');
        Route::post('/companies/delete', [\App\Http\Controllers\APIs\CompanyController::class, 'delete'])->name('companies.delete');
        Route::post('/companies/by/id', [\App\Http\Controllers\APIs\CompanyController::class, 'getById'])->name('companies.by.id');
//      department
        Route::post('/department/list', [\App\Http\Controllers\APIs\DepartmentController::class, 'getAll'])->name('department.list');
        Route::post('/department/create', [\App\Http\Controllers\APIs\DepartmentController::class, 'create'])->name('department.create');
        Route::post('/department/update', [\App\Http\Controllers\APIs\DepartmentController::class, 'update'])->name('department.update');
        Route::post('/department/delete', [\App\Http\Controllers\APIs\DepartmentController::class, 'delete'])->name('department.delete');
        Route::post('/department/by/id', [\App\Http\Controllers\APIs\DepartmentController::class, 'getById'])->name('department.by.id');
        Route::post('/department/by/company/id', [\App\Http\Controllers\APIs\DepartmentController::class, 'getDepartmentByCompny'])->name('department.by.company.id');
//      position
        Route::post('/position/list', [\App\Http\Controllers\APIs\PositionController::class, 'getAll'])->name('position.list');
        Route::post('/position/create', [\App\Http\Controllers\APIs\PositionController::class, 'create'])->name('position.create');
        Route::post('/position/update', [\App\Http\Controllers\APIs\PositionController::class, 'update'])->name('position.update');
        Route::post('/position/delete', [\App\Http\Controllers\APIs\PositionController::class, 'delete'])->name('position.delete');
        Route::post('/position/by/id', [\App\Http\Controllers\APIs\PositionController::class, 'getById'])->name('position.by.id');
//      level
        Route::post('/level/list', [\App\Http\Controllers\APIs\LevelController::class, 'getAll'])->name('level.list');
        Route::post('/level/create', [\App\Http\Controllers\APIs\LevelController::class, 'create'])->name('level.create');
        Route::post('/level/update', [\App\Http\Controllers\APIs\LevelController::class, 'update'])->name('level.update');
        Route::post('/level/delete', [\App\Http\Controllers\APIs\LevelController::class, 'delete'])->name('level.delete');
        Route::post('/level/by/id', [\App\Http\Controllers\APIs\LevelController::class, 'getById'])->name('level.by.id');
//      Employee
        Route::post('employee/list', [\App\Http\Controllers\APIs\EmployeeController::class, 'empList'])->name('employee.list');
        Route::post('delete/employee', [\App\Http\Controllers\APIs\EmployeeController::class, 'employeeDelete'])->name('delete.employee');
        Route::post('find/employee/by-id', [\App\Http\Controllers\APIs\EmployeeController::class, 'findEmpById'])->name('find.employee.by.id');
//      holiday
        Route::post('/holiday/list', [\App\Http\Controllers\APIs\HolidayController::class, 'getAll'])->name('holiday.list');
        Route::post('/holiday/create', [\App\Http\Controllers\APIs\HolidayController::class, 'create'])->name('holiday.create');
        Route::post('/holiday/update', [\App\Http\Controllers\APIs\HolidayController::class, 'update'])->name('holiday.update');
        Route::post('/holiday/delete', [\App\Http\Controllers\APIs\HolidayController::class, 'delete'])->name('holiday.delete');
        Route::post('/holiday/by/id', [\App\Http\Controllers\APIs\HolidayController::class, 'getById'])->name('holiday.by.id');
//      holiday
        Route::post('/tas/list', [\App\Http\Controllers\APIs\TraningAndSemanirController::class, 'getAll'])->name('tas.list');
        Route::post('/tas/create', [\App\Http\Controllers\APIs\TraningAndSemanirController::class, 'create'])->name('tas.create');
        Route::post('/tas/update', [\App\Http\Controllers\APIs\TraningAndSemanirController::class, 'update'])->name('tas.update');
        Route::post('/tas/delete', [\App\Http\Controllers\APIs\TraningAndSemanirController::class, 'delete'])->name('tas.delete');
        Route::post('/tas/by/id', [\App\Http\Controllers\APIs\TraningAndSemanirController::class, 'getById'])->name('tas.by.id');

        //API routes Application
        Route::post('employee/Login', [\App\Http\Controllers\APIs\EmployeeController::class, 'empLogin'])->name('employee.Login');
        Route::post('employee/empPin', [\App\Http\Controllers\APIs\EmployeeController::class, 'savePin'])->name('employee.empPin');
        Route::post('employee/empPasteCardLog', [\App\Http\Controllers\APIs\EmployeePasteCardLogController::class, 'empPasteCardLog'])->name('employee.empPasteCardLog');
        Route::post('employee/empLeave', [\App\Http\Controllers\APIs\EmployeeLeaveController::class, 'EmployeeLeave'])->name('employee.empLeave');
        Route::post('employee/saveEmpLeave', [\App\Http\Controllers\APIs\EmployeeLeaveController::class, 'saveEmpLeave'])->name('employee.saveEmpLeave');

        //API For Web
        Route::post('employee/get/by/company/and/department', [\App\Http\Controllers\APIs\EmployeeController::class, 'getEmployeesByCompanyAndDepartment'])->name('employee.get.by.company.and.department');
        Route::post('employee/get/by/tas', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'getEmployeesByTas'])->name('employee.get.by.tas');
        Route::post('employee/update/status/participate', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'updateStatusParticipate'])->name('employee.update.status.participate');
        Route::post('employee/update/status/cert', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'updateStatusCert'])->name('employee.update.status.cert');
        //API TasEmployees
        Route::post('tasemployees/create', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'create'])->name('tasemployees.create');
        Route::post('tasemployees/list', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'getAll'])->name('tasemployees.list');
        Route::post('tasemployees/by/id', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'getById'])->name('tasemployees.by.id');
        Route::post('tasemployees/delete', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'delete'])->name('tasemployees.delete');
        Route::post('tasemployees/update', [\App\Http\Controllers\APIs\TasEmployeesController::class, 'update'])->name('tasemployees.update');

        //API TasEmployees
        Route::post('salary/template/detail/list', [\App\Http\Controllers\APIs\SalaryTemplateDetailController::class, 'getAll'])->name('salary.template.detail.list');
        Route::post('salary/template/detail/create', [\App\Http\Controllers\APIs\SalaryTemplateDetailController::class, 'create'])->name('salary.template.detail.create');
        Route::post('salary/template/detail/get/by/id/template', [\App\Http\Controllers\APIs\SalaryTemplateDetailController::class, 'getByTemplateId'])->name('salary.template.detail.get.by.id.template');
    }
);
