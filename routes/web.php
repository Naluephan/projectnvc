<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
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

Auth::routes();

Route::group([
    'middleware' => [
        'auth',
    ],
], function () {

    Route::get('/tokens/create', function (Request $request) {
//    $token = $request->user()->createToken('ehr-api');
//    $token = User::find(1)->createToken('ehr-api');
        $user = User::find(1);
        $tokenPlain = 'ehr-api' . '|' . uniqid(); // Generate a unique part for the token to ensure it's unique
        $encryptedToken = Crypt::encrypt($tokenPlain); // Encrypt the token or part of it as per your custom logic

        // Save the encrypted token or its reference in the database
        // This could be directly in your CustomPersonalAccessToken model or another way you've structured it
        $tokenRecord = $user->tokens()->create([
            'name' => 'ehr-api',
            'token' => hash('sha256', $tokenPlain),
            'abilities' => ['*'],
        ]);

        return ['token' => $encryptedToken];
//    return ['token' => $token->plainTextToken];
    });





    //============================> make function after auth here

    //Config
    Route::get('/config', [App\Http\Controllers\ConfigController::class, 'configMenu'])->name('config');
    Route::get('/config/tools', [App\Http\Controllers\ConfigController::class, 'configTools'])->name('config.tools');
    Route::get('/config/asset', [App\Http\Controllers\ConfigController::class, 'configAsset'])->name('config.asset');
    Route::get('/config/department', [App\Http\Controllers\ConfigController::class, 'configDepartment'])->name('config.department');
    Route::get('/config/security', [App\Http\Controllers\ConfigController::class, 'configSecurity'])->name('config.security');
    Route::get('/config/building', [App\Http\Controllers\ConfigController::class, 'configBuilding'])->name('config.building');
    Route::get('/config/cleanness', [App\Http\Controllers\ConfigController::class, 'config'])->name('config.cleanness');
    Route::get('/config/maintenance', [App\Http\Controllers\ConfigController::class, 'configMaintenance'])->name('config.maintenance');
    Route::get('/config/pickuptools', [App\Http\Controllers\ConfigController::class, 'configPickupTools'])->name('config.pickuptools');
    Route::get('/config/worktime', [App\Http\Controllers\ConfigController::class, 'configWorktime'])->name('config.worktime');
    Route::get('/config/holiday', [App\Http\Controllers\ConfigController::class, 'configHoliday'])->name('config.holiday');
    Route::get('/config/itemorganicscoins', [App\Http\Controllers\ConfigController::class, 'configItemOrganicsCoins'])->name('config.itemorganicscoins');
    Route::get('/config/cleanness', [App\Http\Controllers\ConfigController::class, 'configCleanness'])->name('config.cleanness');



    //Profile
   Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'profileMenu'])->name('profile');
   Route::get('/profile/profile', [App\Http\Controllers\ProfileController::class, 'profileProfile'])->name('profile.profile');
   Route::get('/profile/honor', [App\Http\Controllers\ProfileController::class, 'profileHonor'])->name('profile.honor');
   Route::get('/profile/entryandexit', [App\Http\Controllers\ProfileController::class, 'profileEntryandexit'])->name('profile.entryandexit');
   Route::get('/profile/privatecar', [App\Http\Controllers\ProfileController::class, 'profilePrivatecar'])->name('profile.privatecar');
   Route::get('/profile/salary', [App\Http\Controllers\ProfileController::class, 'profileSalary'])->name('profile.salary');
   Route::get('/profile/document', [App\Http\Controllers\ProfileController::class, 'profileDocument'])->name('profile.document');
   Route::get('/profile/loginorganicsplus', [App\Http\Controllers\ProfileController::class, 'profileLoginorganicsplus'])->name('profile.loginorganicsplus');
   Route::get('/profile/transactionhistory', [App\Http\Controllers\ProfileController::class, 'profileTransactionhistory'])->name('profile.transactionhistory');
   Route::get('/profile/equipment', [App\Http\Controllers\ProfileController::class, 'profileEquipment'])->name('profile.equipment');
   Route::get('/profile/holiday', [App\Http\Controllers\ProfileController::class, 'profileHoliday'])->name('profile.holiday');
   Route::get('/profile/socialsecurity', [App\Http\Controllers\ProfileController::class, 'profileSocialsecurity'])->name('profile.socialsecurity');
   Route::get('/profile/organicscoins', [App\Http\Controllers\ProfileController::class, 'profileOrganicscoins'])->name('profile.organicscoins');
   Route::get('/profile/savings', [App\Http\Controllers\ProfileController::class, 'profileSavings'])->name('profile.savings');
   Route::get('/profile/reservefund', [App\Http\Controllers\ProfileController::class, 'profileReservefund'])->name('profile.reservefund');
   Route::get('/profile/groupinsurance', [App\Http\Controllers\ProfileController::class, 'profileGroupinsurance'])->name('profile.groupinsurance');
   Route::get('/profile/organicshero', [App\Http\Controllers\ProfileController::class, 'profileOrganicshero'])->name('profile.organicshero');
   Route::get('/profile/organicsmaintenance', [App\Http\Controllers\ProfileController::class, 'profileOrganicsmaintenance'])->name('profile.organicsmaintenance');
   Route::get('/profile/comment', [App\Http\Controllers\ProfileController::class, 'profileComment'])->name('profile.comment');





});




Route::get('/import', [App\Http\Controllers\ImportExcelController::class, 'viewImport'])->name('import.view');
Route::post('/import/excel', [App\Http\Controllers\ImportExcelController::class, 'importExcel'])->name('excel_import');
Route::get('/employee/info', [App\Http\Controllers\EmployeeInfoController::class, 'employeeInfo'])->name('employee.info');
Route::get('/import/update', [App\Http\Controllers\ImportExcelController::class, 'viewImportUpdate'])->name('import.update.view');
Route::post('/import/update/excel', [App\Http\Controllers\ImportExcelController::class, 'importUpdateCardID'])->name('excel_import.update');





Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/employees/list', [App\Http\Controllers\HomeController::class, 'empList'])->name('employees.list');
Route::get('/emp/detail/{id}', [App\Http\Controllers\HomeController::class, 'empDetail'])->name('emp.detail');

//companies
Route::get('/companies/list', [App\Http\Controllers\CompanyController::class, 'list'])->name('companies.list');
Route::get('/companies/create', [App\Http\Controllers\CompanyController::class, 'companyCreate'])->name('companies.create');
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
Route::get('/tas/employees/check/name/{id}', [App\Http\Controllers\TraningAndSemanirController::class, 'tasEmployeesCheckName'])->name('tas.employees.check.name');

//saraly
Route::get('/saraly/list', [App\Http\Controllers\SaralyEmployeesController::class, 'list'])->name('saraly.list');
//saraly template
Route::get('/saraly/template/list', [App\Http\Controllers\SalaryTemplateController::class, 'list'])->name('saraly.template.list');
//saraly template
Route::get('/saraly/template/detail/list', [App\Http\Controllers\SalaryTemplateDetailController::class, 'list'])->name('saraly.template.detail.list');

Route::get('/saraly/template/detail/add/{id}', [App\Http\Controllers\SalaryTemplateDetailController::class, 'add'])->name('saraly.template.detail.add');

//reward coin
Route::get('/rewardcoin/list', [App\Http\Controllers\RewardCoinController::class, 'list'])->name('rewardcoin.list');

Route::get('/saraly/template/detail/add', [App\Http\Controllers\SalaryTemplateDetailController::class, 'add'])->name('saraly.template.detail.add');
//salary request slip
Route::get('/request/saraly/slip', [App\Http\Controllers\SalaryRequestSlipControlle::class, 'list'])->name('request.saraly.slip');

//Emp Leave
Route::get('/empleave/list', [App\Http\Controllers\EmployeeLeaveController::class, 'list'])->name('empleave.list');


Route::get('/position/cleanline', [App\Http\Controllers\ConfigController::class, 'listPositionCleanline'])->name('position.cleanline');

Route::get('/supply/list', [App\Http\Controllers\ConfigController::class, 'listSupply'])->name('supply.list');

//////// Category Topic ////////
Route::get('/news/Topic/Category', [App\Http\Controllers\ConfigController::class, 'newsTopicCategory'])->name('news.topic.category');

//////// Category Topic ////////
Route::get('/news/Topic/Category', [App\Http\Controllers\ConfigController::class, 'newsTopicCategory'])->name('news.topic.category');

//////// Administrative work categories ////////
Route::get('/administrative/work/categories', [App\Http\Controllers\ConfigController::class, 'administCategories'])->name('administrative.work.categories');
Route::get('/add/administrative/work/categories', [App\Http\Controllers\ConfigController::class, 'addAdministCategories'])->name('add.administrative.work.categories');
// Route::get('/show/administrative/work/categories', [App\Http\Controllers\ConfigController::class, 'addAdministCategories'])->name('show.administrative.work.categories');


Route::get('/news/list', [App\Http\Controllers\NewsController::class, 'listNews'])->name('news.list');
//News Notice Employee
Route::get('/news/notice/employee', [App\Http\Controllers\NewsNoticeEmployeeController::class, 'news_notice_employee'])->name('news.notice.employee');


//Building Location
Route::get('/building/location/list', [App\Http\Controllers\BuildingLocationController::class, 'listLocation'])->name('building.location.list');
Route::get('/holiday/category/list', [App\Http\Controllers\ConfigController::class, 'listHoliday'])->name('holiday.category.list');

