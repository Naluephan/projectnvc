<?php

namespace App\Http\Controllers\APIs;

use App\Repositories\ReserveFundInterface;
use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\ReserveFund;
use App\Repositories\WithdrawReserveFundInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveFundController extends Controller
{
    private $reservefundRepository;
    private $withdrawreservefundRepository;
    public function __construct(ReserveFundInterface $reservefundRepository,WithdrawReserveFundInterface $withdrawreservefundRepository)
    {
        $this->reservefundRepository = $reservefundRepository;
        $this->withdrawreservefundRepository = $withdrawreservefundRepository;
    }

    public function getReserveFund(Request $request)
    {
        try {
            $data = $request->all();
        $getreserve_fund = $this->reservefundRepository->getReserveFund($data);
        if (count($getreserve_fund) > 0) {
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
            $result['data'] = $getreserve_fund;
        } else {
            $result['status'] = ApiStatus::reverse_fund_failed_status;
            $result['statusCode'] = ApiStatus::reverse_fund_failed_statusCode;
            $result['errDesc'] = ApiStatus::reverse_fund_failed_Desc;
        }
    } catch (\Exception $e) {
        $result['status'] = ApiStatus::reverse_fund_error_statusCode;
        $result['errCode'] = ApiStatus::reverse_fund_error_status;
        $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
        $result['message'] = $e->getMessage();
    }
    return $result;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        try {
            $search_criteria = [
                'emp_id' => $data['emp_id'],
            ];
            $old_reserve =$this->reservefundRepository->findAmountByEmpId($search_criteria);
            $emp = Employee::find($data['emp_id']);
            $total_m =  $data['reserve']+$data['contribution'];
            $total_reserve =  $data['reserve']+$data['accumulate_balance'];
            $existing_balance = $old_reserve ? $old_reserve->accumulate_balance : 0;
            $new_accumulate_balance = $existing_balance + $total_reserve + $data['accumulate_balance'];
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'reserve_fund_number' => $data['reserve_fund_number'],
                    'saving_rate' => $data['saving_rate'],
                    'position_id' => $emp->position_id,
                    'company_id' => $emp->company_id,
                    'department_id' => $emp->department_id,
                    'day' => $data['day'],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'reserve' => $data['reserve'],
                    'contribution' => $data['contribution'],
                    'total_month' => $total_m,
                    'accumulate_balance' =>$new_accumulate_balance,

                ];
                $this->reservefundRepository->create($save_data);
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::reverse_fund_error_statusCode;
            $result['errCode'] = ApiStatus::reverse_fund_error_status;
            $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }


    public function update(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->reservefundRepository->update($id, $data);
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::reverse_fund_error_statusCode;
            $result['errCode'] = ApiStatus::reverse_fund_error_status;
            $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public function getById(Request $request)
    {
        $id = $request->emp_id;
        try {
         $reserve = $this->reservefundRepository->getById($id);
         if (count($reserve) > 0) {
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
            $result['data'] = $reserve;
        } else {
            $result['status'] = ApiStatus::reverse_fund_failed_status;
            $result['statusCode'] = ApiStatus::reverse_fund_failed_statusCode;
            $result['errDesc'] = ApiStatus::reverse_fund_failed_Desc;
            $result['message'] = $reserve;
            DB::rollBack();
        }
    } catch (\Exception $ex) {
        $result['status'] = ApiStatus::reverse_fund_error_statusCode;
        $result['errCode'] = ApiStatus::reverse_fund_error_status;
        $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
        $result['message'] = $ex->getMessage();
        DB::rollBack();
    }
    return $result;
}

    public function delete(Request $request)
    {
        $id = $request->id;

        try {
            $this->reservefundRepository->delete($id);
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::reverse_fund_error_statusCode;
            $result['errCode'] = ApiStatus::reverse_fund_error_status;
            $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    // public function  createWithdraw(Request $request)
    // {
    //     $postData = $request->all();
    //     try {
    //         $reserve = ReserveFund::find($postData['reserse_fund_id']);
    //         $amount = $this->withdrawreservefundRepository->findAmountByEmpId($postData['emp_id']);
    //         $total = $amount ? $amount->accumulate_balance : 0;
    //         $withdraw_balance = $reserve['accumulate_balance'] - $total;
    //             $data = [
    //                 'emp_id' =>$postData['emp_id'],
    //                 'reserse_fund_id' => $postData['reserse_fund_id'],
    //                 'reserse_fund_detail' => $postData['reserse_fund_detail'],
    //                 'withdraw_balance' => $withdraw_balance,

    //             ];
    //             $this->withdrawreservefundRepository->create($data);
    //             $reserve->accumulate_balance -= $withdraw_balance;
    //             $reserve->save();
    //             $result['status'] = ApiStatus::reverse_fund_success_status;
    //             $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;

    //     } catch (\Exception $e) {
    //         $result['status'] = ApiStatus::reverse_fund_error_status;
    //         $result['errCode'] = ApiStatus::reverse_fund_error_statusCode;
    //         $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
    //         $result['message'] = $e->getMessage();
    //     }
    //     return $result;
    // }
    public function createWithdraw(Request $request)
    {
        $postData = $request->all();
        try {

            $amount = $this->withdrawreservefundRepository->findAmountByEmpId($postData['emp_id']);
            // $total = $amount ? $amount->accumulate_balance;
            $withdraw_balance = $amount->accumulate_balance;
            $data = [
                'emp_id' => $postData['emp_id'],
                // 'reserse_fund_id' =>  $reserve->id,
                'reserse_fund_detail' => $postData['reserse_fund_detail'],
                'withdraw_balance' => $withdraw_balance,
            ];

            // Create the withdraw reserve fund record
            $this->withdrawreservefundRepository->create($data);
            $this->reservefundRepository->updateAccumulateBalance($postData['emp_id'], 0);
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;

        } catch (\Exception $e) {
            // Handle exceptions and set error result
            $result['status'] = ApiStatus::reverse_fund_error_status;
            $result['errCode'] = ApiStatus::reverse_fund_error_statusCode;
            $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public function getwithdraw(Request $request)
    {
        $data = $request->all();
        try {
        $getreserve_fund = $this->withdrawreservefundRepository->getWithdraw($data);
        if (count($getreserve_fund) > 0) {
            $result['status'] = ApiStatus::reverse_fund_success_status;
            $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
            $result['data'] = $getreserve_fund;
        } else {
            $result['status'] = ApiStatus::reverse_fund_failed_status;
            $result['statusCode'] = ApiStatus::reverse_fund_failed_statusCode;
            $result['errDesc'] = ApiStatus::reverse_fund_failed_Desc;
        }
    } catch (\Exception $e) {
        $result['status'] = ApiStatus::reverse_fund_error_statusCode;
        $result['errCode'] = ApiStatus::reverse_fund_error_status;
        $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
        $result['message'] = $e->getMessage();
    }
    return $result;
    }

    public function getReserveFundByFilter(Request $request)
    {

        try {
            $data = $request->all();

            $reserve = $this->reservefundRepository->getReserveFundByFilter($data);
            if (count($reserve) > 0) {
                $result['status'] = ApiStatus::reverse_fund_success_status;
                $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
                $result['data'] = $reserve;
            } else {
                $result['status'] = ApiStatus::reverse_fund_failed_status;
                $result['statusCode'] = ApiStatus::reverse_fund_failed_statusCode;
                $result['errDesc'] = ApiStatus::reverse_fund_failed_Desc;
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::reverse_fund_error_statusCode;
            $result['errCode'] = ApiStatus::reverse_fund_error_status;
            $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
        }

    public function approve(Request $request)
    {
        $data = $request->all();
        $id = $data['id'];
        try {
            $data = [
                'reserve_request' => $data['reserve_request']
            ];
            $this->withdrawreservefundRepository->update($id, $data);
            $result['status'] = ApiStatus::social_security_success_status;
            $result['statusCode'] = ApiStatus::social_security_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::social_security_error_statusCode;
            $result['errCode'] = ApiStatus::social_security_error_status;
            $result['errDesc'] = ApiStatus::social_security_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

}
