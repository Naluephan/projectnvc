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

                Route::group(['middleware' => 'custom-sanctum'], function () {
                        //test metohd
                        Route::post('/test/numbers', function () {
                                return response()->json([1, 2, 3, 4, 5]);
                        })->name('test.number');



                        Route::post('/companies', [\App\Http\Controllers\APIs\CompanyController::class, 'getCompanies'])->name('companies');
                });
                Route::post('/employee/paste/card', [\App\Http\Controllers\APIs\EmployeePasteCardController::class, 'pasteCard'])->name('employee.paste.card');
                Route::post('create/employee/paste/card', [\App\Http\Controllers\APIs\EmployeePasteCardLogController::class, 'pasteCardLogCreate'])->name('create.paste.card.log');
                //      Company
                Route::post('/companies/list', [\App\Http\Controllers\APIs\CompanyController::class, 'getAll'])->name('companies.list');
                Route::post('/companies/getList', [\App\Http\Controllers\APIs\CompanyController::class, 'getCompanyList'])->name('companies.getList');
                Route::post('/companies/create', [\App\Http\Controllers\APIs\CompanyController::class, 'create'])->name('companies.create');
                Route::post('/companies/update', [\App\Http\Controllers\APIs\CompanyController::class, 'update'])->name('companies.update');
                Route::post('/companies/delete', [\App\Http\Controllers\APIs\CompanyController::class, 'delete'])->name('companies.delete');
                Route::post('/companies/by/id', [\App\Http\Controllers\APIs\CompanyController::class, 'getById'])->name('companies.by.id');
                //      department
                Route::post('/department/list/setting', [\App\Http\Controllers\APIs\DepartmentController::class, 'getAll'])->name('department.list.setting');
                Route::post('/department/create', [\App\Http\Controllers\APIs\DepartmentController::class, 'create'])->name('department.create');
                Route::post('/department/and/position/create', [\App\Http\Controllers\APIs\DepartmentController::class, 'createDepartmentAndPosition'])->name('department.and.position.create');
                Route::post('/department/update', [\App\Http\Controllers\APIs\DepartmentController::class, 'update'])->name('department.update');
                Route::post('/department/delete', [\App\Http\Controllers\APIs\DepartmentController::class, 'delete'])->name('department.delete');
                Route::post('/department/by/id', [\App\Http\Controllers\APIs\DepartmentController::class, 'getById'])->name('department.by.id');
                Route::post('/department/by/company/id', [\App\Http\Controllers\APIs\DepartmentController::class, 'getDepartmentByCompny'])->name('department.by.company.id');
                Route::post('/department/filter', [\App\Http\Controllers\APIs\DepartmentController::class, 'departmentFilter'])->name('department.filter');
                Route::post('/department/find/id', [\App\Http\Controllers\APIs\DepartmentController::class, 'getDepartmentById'])->name('department.find.id');
                Route::post('/department/and/position/update', [\App\Http\Controllers\APIs\DepartmentController::class, 'updateDepartmentAndPosition'])->name('department.and.position.update');
                //      position
                Route::post('/position/list', [\App\Http\Controllers\APIs\PositionController::class, 'getAll'])->name('position.list');
                Route::post('/position/create', [\App\Http\Controllers\APIs\PositionController::class, 'create'])->name('position.create');
                Route::post('/position/update', [\App\Http\Controllers\APIs\PositionController::class, 'update'])->name('position.update');
                Route::post('/position/delete', [\App\Http\Controllers\APIs\PositionController::class, 'delete'])->name('position.delete');
                Route::post('/position/by/id', [\App\Http\Controllers\APIs\PositionController::class, 'getById'])->name('position.by.id');
                Route::post('/position/filter', [\App\Http\Controllers\APIs\PositionController::class, 'positionFilter'])->name('position.filter');
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
                Route::post('employee/reward/coin', [\App\Http\Controllers\APIs\RewardCoinController::class, 'rewardCoin'])->name('employee.reward.coin');
                Route::post('employee/salary', [\App\Http\Controllers\APIs\SaralyEmployeesController::class, 'employeeSalary'])->name('employee.salary');
                Route::post('employee/attendance/by/month/year', [\App\Http\Controllers\APIs\EmployeeTimeAttendanceController::class, 'empTimeByMonthAndYear'])->name('employee.attendance.by.month.year');
                Route::post('employee/leaveQuotas', [\App\Http\Controllers\APIs\EmployeeLeaveQuotasController::class, 'employeeLeaveQuotas'])->name('employee.leave.quotas');
                Route::post('employee/reward/coin/by/id', [\App\Http\Controllers\APIs\RewardCoinHistoryController::class, 'rewardCoinById'])->name('reward.coin.byId');
                Route::post('privatecar/list/employee', [\App\Http\Controllers\APIs\PrivateCarController::class, 'getPrivatecarEmployee'])->name('privatecar.list.employee');
                Route::post('pickup/tools/list/employee', [\App\Http\Controllers\APIs\PickupToolsEmployeeController::class, 'pickupToolsListEmployee'])->name('pickup.tools.list.employee');
                Route::post('organicsHero/listMission/employee', [\App\Http\Controllers\APIs\OrganicsHeroMissionEmployeeController::class, 'getListMissionEmployee'])->name('organic.hero.mission.list.mission.employee');

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

                //API SalaryTemplate
                Route::post('salary/template/list', [\App\Http\Controllers\APIs\SalaryTemplateController::class, 'getAll'])->name('salary.template.list');
                Route::post('salary/template/create', [\App\Http\Controllers\APIs\SalaryTemplateController::class, 'create'])->name('salary.template.create');
                Route::post('salary/template/update', [\App\Http\Controllers\APIs\SalaryTemplateController::class, 'update'])->name('salary.template.update');
                Route::post('salary/template/delete', [\App\Http\Controllers\APIs\SalaryTemplateController::class, 'delete'])->name('salary.template.delete');
                Route::post('salary/template/get/by/id', [\App\Http\Controllers\APIs\SalaryTemplateController::class, 'getById'])->name('salary.template.get.by.id');
                Route::post('salary/template/detail/list', [\App\Http\Controllers\APIs\SalaryTemplateDetailController::class, 'getAll'])->name('salary.template.detail.list');
                Route::post('salary/template/detail/create', [\App\Http\Controllers\APIs\SalaryTemplateDetailController::class, 'create'])->name('salary.template.detail.create');
                Route::post('salary/template/detail/get/by/id/template', [\App\Http\Controllers\APIs\SalaryTemplateDetailController::class, 'getByTemplateId'])->name('salary.template.detail.get.by.id.template');

                //API Reward Coin
                Route::post('reward/list', [\App\Http\Controllers\APIs\RewardCoinController::class, 'getAll'])->name('reward.list');
                Route::post('reward/create', [\App\Http\Controllers\APIs\RewardCoinController::class, 'create'])->name('reward.create');
                Route::post('reward/update', [\App\Http\Controllers\APIs\RewardCoinController::class, 'update'])->name('reward.update');
                Route::post('reward/get/by/id', [\App\Http\Controllers\APIs\RewardCoinController::class, 'getById'])->name('reward.get.by.id');
                Route::post('reward/delete', [\App\Http\Controllers\APIs\RewardCoinController::class, 'delete'])->name('reward.delete');

                //API Salary Request Slip
                Route::post('salary/request/slip/list', [\App\Http\Controllers\APIs\SalaryRequestSlipControlle::class, 'getAll'])->name('salary.request.slip.list');
                Route::post('salary/request/slip/approve', [\App\Http\Controllers\APIs\SalaryRequestSlipControlle::class, 'approve'])->name('salary.request.slip.approve');
                Route::post('salary/request/slip/create', [\App\Http\Controllers\APIs\SalaryRequestSlipControlle::class, 'salary_create_request_slip'])->name('salary.create.request.slip');

                //API Check Token
                Route::post('check-token', [\App\Http\Controllers\APIs\EmployeeController::class, 'checkToken'])->name('check.token');

                //API emp leave
                Route::post('emp/leave/list', [\App\Http\Controllers\APIs\EmployeeLeaveController::class, 'getAll'])->name('emp.leave.list');
                Route::post('emp/leave/delete', [\App\Http\Controllers\APIs\EmployeeLeaveController::class, 'delete'])->name('emp.leave.delete');
                Route::post('emp/leave/by/id', [\App\Http\Controllers\APIs\EmployeeLeaveController::class, 'getById'])->name('emp.leave.by.id');
                Route::post('emp/approve/status', [\App\Http\Controllers\APIs\EmployeeLeaveController::class, 'approveStatusLeave'])->name('emp.approve.status');

                //API Supply Category
                Route::post('/category/list', [\App\Http\Controllers\APIs\SupplyCategoryController::class, 'getSupplyCategory'])->name('category.list');
                Route::post('/category/create', [\App\Http\Controllers\APIs\SupplyCategoryController::class, 'create'])->name('category.create');
                Route::post('/category/update', [\App\Http\Controllers\APIs\SupplyCategoryController::class, 'update'])->name('category.update');
                Route::post('/category/delete', [\App\Http\Controllers\APIs\SupplyCategoryController::class, 'delete'])->name('category.delete');
                Route::post('/category/by/id', [\App\Http\Controllers\APIs\SupplyCategoryController::class, 'getById'])->name('category.by.id');

                //API AssetCategory
                Route::post('asset/category/list', [\App\Http\Controllers\APIs\AssetCategoryController::class, 'getAssetCategory'])->name('asset.category.list');
                Route::post('asset/category/create', [\App\Http\Controllers\APIs\AssetCategoryController::class, 'create'])->name('asset.category.create');
                Route::post('asset/category/update', [\App\Http\Controllers\APIs\AssetCategoryController::class, 'update'])->name('asset.category.update');
                Route::post('asset/category/delete', [\App\Http\Controllers\APIs\AssetCategoryController::class, 'delete'])->name('asset.category.delete');
                Route::post('asset/category/by/id', [\App\Http\Controllers\APIs\AssetCategoryController::class, 'getById'])->name('asset.category.by.id');

                //API News
                Route::post('news/list', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'news_list'])->name('news.list');

                //API Reward Coin History
                Route::post('reward/history/list', [\App\Http\Controllers\APIs\RewardCoinHistoryController::class, 'reward_history'])->name('reward.history');

                //API Check Password
                Route::post('login/check/password', [\App\Http\Controllers\APIs\EmployeeController::class, 'login_check_password'])->name('login.check.password');
                Route::post('profile/check/password', [\App\Http\Controllers\APIs\EmployeeController::class, 'profile_check_password'])->name('profile.check.password');

                //API Update Password
                Route::post('update/password', [\App\Http\Controllers\APIs\EmployeeController::class, 'update_password'])->name('update.password');

                //API NewsCategory
                Route::post('/news/category/list', [\App\Http\Controllers\APIs\NewsTopicCategoryController::class, 'getNewsCategory'])->name('news.category.list');
                Route::post('/news/category/create', [\App\Http\Controllers\APIs\NewsTopicCategoryController::class, 'create'])->name('news.category.create');
                Route::post('/news/category/update', [\App\Http\Controllers\APIs\NewsTopicCategoryController::class, 'update'])->name('news.category.update');
                Route::post('/news/category/delete', [\App\Http\Controllers\APIs\NewsTopicCategoryController::class, 'delete'])->name('news.category.delete');
                Route::post('/news/category/by/id', [\App\Http\Controllers\APIs\NewsTopicCategoryController::class, 'getById'])->name('news.category.by.id');
                //API PositionCleanLine
                Route::post('position/clean/line/list', [\App\Http\Controllers\APIs\PositionCleanlineController::class, 'getPositionCleanLine'])->name('position.clean.line.list');
                Route::post('position/clean/line/create', [\App\Http\Controllers\APIs\PositionCleanlineController::class, 'create'])->name('position.clean.line.create');
                Route::post('position/clean/line/update', [\App\Http\Controllers\APIs\PositionCleanlineController::class, 'update'])->name('position.clean.line.update');
                Route::post('position/clean/line/delete', [\App\Http\Controllers\APIs\PositionCleanlineController::class, 'delete'])->name('position.clean.line.delete');
                Route::post('position/clean/line/by/id', [\App\Http\Controllers\APIs\PositionCleanlineController::class, 'getById'])->name('position.clean.line.by.id');

                //API News Notice Employee
                Route::post('news/notice/employee', [\App\Http\Controllers\APIs\NewsNoticeEmployeeController::class, 'news_notice_employee'])->name('news.notice.employee');
                Route::post('news/notice/employee/update/read/status', [\App\Http\Controllers\APIs\NewsNoticeEmployeeController::class, 'updateReadStatus'])->name('news.notice.employee.update.read.status');

                //API News Notice
                Route::post('news/notice/employee', [\App\Http\Controllers\APIs\NewsNoticeEmployeeController::class, 'news_notice_employee'])->name('news.notice.employee');
                Route::post('news/notice/employee/list', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'news_notice_employee_lists'])->name('news.notice.employee.lists');
                Route::post('news/notice/employee/create', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'create'])->name('news.notice.employee.create');
                Route::post('news/notice/employee/delete', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'delete'])->name('news.notice.employee.delete');
                Route::post('news/notice/employee/update', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'update'])->name('news.notice.employee.update');
                Route::post('news/notice/employee/by/id', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'getById'])->name('news.notice.employee.by.id');
                Route::post('news/notice/search/by/id', [\App\Http\Controllers\APIs\NewsNoticeController::class, 'searchNewsById'])->name('search.news.by.id');

                //API Pickup Tools
                Route::post('pickup/tools/show/detail/by/id', [\App\Http\Controllers\APIs\DepartmentController::class, 'showDetailById'])->name('pickup.tools.show.detail.by.id');
                Route::post('pickup/tools/all/list', [\App\Http\Controllers\APIs\PickupToolsController::class, 'getAll'])->name('pickup.tools.all.list');
                Route::post('pickup/tools/create', [\App\Http\Controllers\APIs\PickupToolsController::class, 'create'])->name('pickup.tools.create');
                Route::post('pickup/tools/delete', [\App\Http\Controllers\APIs\PickupToolsController::class, 'delete'])->name('pickup.tools.delete');
                Route::post('pickup/tools/update', [\App\Http\Controllers\APIs\PickupToolsController::class, 'update'])->name('pickup.tools.update');



                //api security setting
                Route::post('security/list', [\App\Http\Controllers\APIs\SecuritySettingController::class, 'securityList'])->name('security.list');
                Route::post('security/create', [\App\Http\Controllers\APIs\SecuritySettingController::class, 'create'])->name('security.create');
                Route::post('security/by/id', [\App\Http\Controllers\APIs\SecuritySettingController::class, 'getSecurityById'])->name('security.by.id');
                Route::post('security/update', [\App\Http\Controllers\APIs\SecuritySettingController::class, 'securityUpdate'])->name('security.update');

                //API NewsCategory
                Route::post('/administrative/work/categories/list', [\App\Http\Controllers\APIs\AdministWorkCategoriesController::class, 'getAdministList'])->name('administrative.work.categories.list');
                Route::post('/administrative/work/categories/create', [\App\Http\Controllers\APIs\AdministWorkCategoriesController::class, 'create'])->name('administrative.work.categories.create');
                Route::post('/administrative/work/categories/update', [\App\Http\Controllers\APIs\AdministWorkCategoriesController::class, 'update'])->name('administrative.work.categories.update');
                Route::post('/administrative/work/categories/delete', [\App\Http\Controllers\APIs\AdministWorkCategoriesController::class, 'delete'])->name('administrative.work.categories.delete');
                Route::post('/administrative/work/categories/by/id', [\App\Http\Controllers\APIs\AdministWorkCategoriesController::class, 'getById'])->name('administrative.work.categories.by.id');

                //API BuildingLocation
                Route::post('/building/location/detail/by/id', [\App\Http\Controllers\APIs\BuildingLocationController::class, 'getBuildingById'])->name('building.location.detail.by.id');
                Route::post('/building/location/list', [\App\Http\Controllers\APIs\BuildingLocationController::class, 'getBuildingLocation'])->name('building.location.list');
                Route::post('/building/location/create', [\App\Http\Controllers\APIs\BuildingLocationController::class, 'create'])->name('building.location.create');
                Route::post('/building/location/update', [\App\Http\Controllers\APIs\BuildingLocationController::class, 'update'])->name('building.location.update');
                Route::post('/building/location/delete', [\App\Http\Controllers\APIs\BuildingLocationController::class, 'delete'])->name('building.location.delete');
                Route::post('/building/location/by/id', [\App\Http\Controllers\APIs\BuildingLocationController::class, 'getById'])->name('building.location.by.id');


                //API HolidayCategory
                Route::post('/holiday/category/list', [\App\Http\Controllers\APIs\HolidayCategoryController::class, 'getHolidayCategory'])->name('holiday.category.list');
                Route::post('/holiday/category/create', [\App\Http\Controllers\APIs\HolidayCategoryController::class, 'create'])->name('holiday.category.create');
                Route::post('/holiday/category/update', [\App\Http\Controllers\APIs\HolidayCategoryController::class, 'update'])->name('holiday.category.update');
                Route::post('/holiday/category/delete', [\App\Http\Controllers\APIs\HolidayCategoryController::class, 'delete'])->name('holiday.category.delete');
                Route::post('/holiday/category/by/id', [\App\Http\Controllers\APIs\HolidayCategoryController::class, 'getById'])->name('holiday.category.by.id');


                //API Worktime
                Route::post('/worktime/list', [\App\Http\Controllers\APIs\WorktimeController::class, 'getWorktime'])->name('worktime.list');
                Route::post('/worktime/create', [\App\Http\Controllers\APIs\WorktimeController::class, 'create'])->name('worktime.create');
                Route::post('/worktime/update', [\App\Http\Controllers\APIs\WorktimeController::class, 'update'])->name('worktime.update');
                Route::post('/worktime/delete', [\App\Http\Controllers\APIs\WorktimeController::class, 'delete'])->name('worktime.delete');
                Route::post('/worktime/by/id', [\App\Http\Controllers\APIs\WorktimeController::class, 'getById'])->name('worktime.by.id');

                //API Private Car
                Route::post('privatecar/list', [\App\Http\Controllers\APIs\PrivateCarController::class, 'getPrivatecarEmployee'])->name('privatecar.list');
                Route::post('privatecar/create', [\App\Http\Controllers\APIs\PrivateCarController::class, 'create'])->name('privatecar.create');
                Route::post('privatecar/delete', [\App\Http\Controllers\APIs\PrivateCarController::class, 'deleteUpdate'])->name('privatecar.delete');

                //api maintenance setting
                Route::post('maintenance/list', [\App\Http\Controllers\APIs\MaintenanceSettingController::class, 'maintenanceList'])->name('maintenance.list');
                Route::post('maintenance/create', [\App\Http\Controllers\APIs\MaintenanceSettingController::class, 'create'])->name('maintenance.create');
                Route::post('maintenance/by/id', [\App\Http\Controllers\APIs\MaintenanceSettingController::class, 'getmaintenanceById'])->name('maintenance.by.id');
                Route::post('maintenance/update', [\App\Http\Controllers\APIs\MaintenanceSettingController::class, 'maintenanceUpdate'])->name('maintenance.update');

                //profile personal information
                Route::post('profile/personalInfo/get/by/id', [\App\Http\Controllers\APIs\ProfilePersonalInformationController::class, 'getById'])->name('profile.personalInfo.get.by.id');

                //////////// contracts categories ////////////
                // Route::post('contracts/categories/create', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'create'])->name('contracts.categories.create');
                // Route::post('contracts/categories/update', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'update'])->name('contracts.categories.update');
                // Route::post('contracts/categories/delete', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'delete'])->name('contracts.categories.delete');
                // Route::post('contracts/categories/getAll', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'getConCategory'])->name('contracts.categories.getAll');
                // Route::post('contracts/categories/get/by/id', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'getById'])->name('contracts.categories.get.by.id');
                //contracts detail
                Route::post('contracts/categories/create', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'create'])->name('contracts.categories.create');
                Route::post('contracts/categories/update', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'update'])->name('contracts.categories.update');
                Route::post('contracts/categories/delete', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'delete'])->name('contracts.categories.delete');
                Route::post('contracts/categories/getAll', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'getConCategory'])->name('contracts.categories.getAll');
                Route::post('contracts/categories/get/by/id', [\App\Http\Controllers\APIs\ContractsCategoriesController::class, 'getById'])->name('contracts.categories.get.by.id');



               

        }



);


Route::group(
        [
                'prefix' => 'app/v1', 'as' => 'api.app.v1.',
                //        'middleware' => [ 'auth', ],
        ],
        function () {
                Route::group(['middleware' => 'auth:sanctum'], function () {
                        Route::post('/test/numbers', function () {
                                return response()->json([1, 2, 3, 4, 5]);
                        })->name('test.number');
                });
                // transaction history API APP
                Route::post('get/transaction/by/id', [\App\Http\Controllers\APIs\TransactionHistoryController::class, 'transactionListApp'])->name('get.transaction.by.id');

                // saving money API APP
                Route::post('get/saving/money/by/id', [\App\Http\Controllers\APIs\SavingMoneyController::class, 'savingMoneyListApp'])->name('get.saving.money.by.id');
                Route::post('create/deposit/money', [\App\Http\Controllers\APIs\SavingMoneyController::class, 'createDepositApp'])->name('create.deposit.money');
                Route::post('create/withdraw/money', [\App\Http\Controllers\APIs\SavingMoneyController::class, 'createWithdrawApp'])->name('create.withdraw.money');


                 //honor
                Route::post('honor/list', [\App\Http\Controllers\APIs\HonorController::class, 'getHonor'])->name('honor.list');
                Route::post('honor/create', [\App\Http\Controllers\APIs\HonorController::class, 'create'])->name('honor.create');


                //Social Security
                Route::post('social/security/list',[\App\Http\Controllers\APIs\SocialSecurityController::class, 'getSocialSecurity'])->name('social.security.list');
                Route::post('social/security/create',[\App\Http\Controllers\APIs\SocialSecurityController::class, 'create'])->name('social.security.create');

                //Reserve Fund
                Route::post('reserve/fund/list',[\App\Http\Controllers\APIs\ReserveFundController::class,'getReserveFund'])->name('reserve.fund.list');
                Route::post('reserve/fund/create',[\App\Http\Controllers\APIs\ReserveFundController::class,'create'])->name('reserve.fund.create');

                 //Group Insurance
                 Route::post('group/insurance/list',[\App\Http\Controllers\APIs\GroupInsuranceController::class,'getGroupInsurance'])->name('group.insurance.list');
                 Route::post('group/insurance/create',[\App\Http\Controllers\APIs\GroupInsuranceController::class,'create'])->name('group.insurance.create');
 

        }
);
