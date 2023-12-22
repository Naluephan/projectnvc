<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
//    return abort(403);
    return redirect()->route('login');
});

Route::group([
    'middleware' => [
        'auth',
    ],
], function () {

    //make function after auth here




});


Route::get('/tokens/create', function (Request $request) {
//    $token = $request->user()->createToken('ehr-api');
    $token = User::find(1)->createToken('ehr-api');
    return ['token' => $token->plainTextToken];
});

Route::get('/import', [App\Http\Controllers\ImportExcelController::class, 'viewImport'])->name('import.view');
Route::post('/import/excel', [App\Http\Controllers\ImportExcelController::class, 'importExcel'])->name('excel_import');
Route::get('/employee/info', [App\Http\Controllers\EmployeeInfoController::class, 'employeeInfo'])->name('employee.info');
Route::get('/import/update', [App\Http\Controllers\ImportExcelController::class, 'viewImportUpdate'])->name('import.update.view');
Route::post('/import/update/excel', [App\Http\Controllers\ImportExcelController::class, 'importUpdateCardID'])->name('excel_import.update');



// Route::get('/business_card1', [App\Http\Controllers\BusinessCardController::class, 'index'])->name('business_card.index');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employees/list', [App\Http\Controllers\HomeController::class, 'empList'])->name('employees.list');
Route::get('/emp/detail/{id}', [App\Http\Controllers\HomeController::class, 'empDetail'])->name('emp.detail');

//companies
Route::get('/companies/list', [App\Http\Controllers\CompanyController::class, 'list'])->name('companies.list');
//department
Route::get('/department/list', [App\Http\Controllers\DepartmentController::class, 'list'])->name('department.list');
//position
Route::get('/position/list', [App\Http\Controllers\PositionController::class, 'list'])->name('position.list');
//level
Route::get('/level/list', [App\Http\Controllers\LevelController::class, 'list'])->name('level.list');
//holiday
Route::get('/holiday/list', [App\Http\Controllers\HolidayController::class, 'list'])->name('holiday.list');
//traning and semanir
Route::get('/tas/list', [App\Http\Controllers\TraningAndSemanirController::class, 'list'])->name('tas.list');
Route::get('/tas/addemployees/{id}', [App\Http\Controllers\TraningAndSemanirController::class, 'addEmployees'])->name('tas.addemployees');
Route::get('/tas/employees/detail/{id}', [App\Http\Controllers\TraningAndSemanirController::class, 'tasEmployeesDetail'])->name('tas.employees.detail');