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

//        Employee
        Route::post('employee/list', [\App\Http\Controllers\APIs\EmployeeController::class, 'empList'])->name('employee.list');
    }
);
