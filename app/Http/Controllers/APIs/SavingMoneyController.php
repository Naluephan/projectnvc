<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\SavingMoneyInterface;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SavingMoneyController extends Controller
{
    private $savingMoneypository;

    public function __construct(
        SavingMoneyInterface $savingMoneypository
    ) {
        $this->savingMoneypository = $savingMoneypository;
    }

    public function  savingMoneyListApp(Request $request)
    {
        try {
            $data = $request->all();

            $saving_data = $this->savingMoneypository->savingMoneyListApp($data);
            if (count($saving_data) > 0) {
                $result['status'] = ApiStatus::saving_money_success_status;
                $result['statusCode'] = ApiStatus::saving_money_success_statusCode;
                $result['data'] = $saving_data;
            } else {
                $result['status'] = ApiStatus::saving_money_failed_status;
                $result['statusCode'] = ApiStatus::saving_money_failed_statusCode;
                $result['errDesc'] = ApiStatus::saving_money_failed_Desc;
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::saving_money_error_statusCode;
            $result['errCode'] = ApiStatus::saving_money_error_status;
            $result['errDesc'] = ApiStatus::saving_money_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function  createDepositApp(Request $request)
    {
        $postData = $request->all();
        $now = Carbon::now();
        try {
            $amount = $this->savingMoneypository->findAmountByEmpId($postData['user_id']);

            $total = $amount ? $amount->total_amount : 0;

            $data = [
                'emp_id' => $postData['user_id'],
                'save_status' => 1,
                'amount' => $postData['amount'],
                'month' => $now->month,
                'year' => $now->year,
                'save_date' => $now,
                'approve_status' => 2,
                'save_channel' => $postData['save_channel'],
                'total_amount' => $total + $postData['amount'],
            ];
            $this->savingMoneypository->create($data);
            $result['status'] = ApiStatus::saving_money_success_status;
            $result['statusCode'] = ApiStatus::saving_money_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::saving_money_error_statusCode;
            $result['errCode'] = ApiStatus::saving_money_error_status;
            $result['errDesc'] = ApiStatus::saving_money_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }

    public function  createWithdrawApp(Request $request)
    {
        $postData = $request->all();
        $now = Carbon::now();
        try {
            $amount = $this->savingMoneypository->findAmountByEmpId($postData['user_id']);

            $total = $amount ? $amount->total_amount : 0;
            if ($postData['amount'] < $total) {
                $data = [
                    'emp_id' => $postData['user_id'],
                    'save_status' => 2,
                    'amount' => $postData['amount'],
                    'month' => $now->month,
                    'year' => $now->year,
                    'save_date' => $now,
                    'approve_status' => 1,
                    'save_channel' => $postData['save_channel'],
                    'total_amount' => $total - $postData['amount'],
                ];
                $this->savingMoneypository->create($data);
                $result['status'] = ApiStatus::saving_money_success_status;
                $result['statusCode'] = ApiStatus::saving_money_success_statusCode;
            }else{
                $result['status'] = ApiStatus::saving_money_failed_status;
                $result['errCode'] = ApiStatus::saving_money_error_status;
                $result['errDesc'] = ApiStatus::saving_money_errDesc;
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::saving_money_error_statusCode;
            $result['errCode'] = ApiStatus::saving_money_error_status;
            $result['errDesc'] = ApiStatus::saving_money_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
