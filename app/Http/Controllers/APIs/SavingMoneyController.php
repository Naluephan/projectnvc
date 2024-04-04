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
                $result['status'] = ApiStatus::transaction_history_success_status;
                $result['statusCode'] = ApiStatus::transaction_history_success_statusCode;
                $result['data'] = $saving_data;
            } else {
                $result['status'] = ApiStatus::transaction_history_failed_status;
                $result['statusCode'] = ApiStatus::transaction_history_failed_statusCode;
                $result['errDesc'] = ApiStatus::transaction_history_failed_Desc;
            }
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::transaction_history_error_statusCode;
            $result['errCode'] = ApiStatus::transaction_history_error_status;
            $result['errDesc'] = ApiStatus::transaction_history_errDesc;
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
                'save_channel' => $postData['save_channel'],
                'total_amount' => $total + $postData['amount'],
            ];
            $this->savingMoneypository->create($data);
            $result['status'] = ApiStatus::transaction_history_success_status;
            $result['statusCode'] = ApiStatus::transaction_history_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::transaction_history_error_statusCode;
            $result['errCode'] = ApiStatus::transaction_history_error_status;
            $result['errDesc'] = ApiStatus::transaction_history_errDesc;
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

            $data = [
                'emp_id' => $postData['user_id'],
                'save_status' => 2,
                'amount' => $postData['amount'],
                'month' => $now->month,
                'year' => $now->year,
                'save_date' => $now,
                'save_channel' => $postData['save_channel'],
                'total_amount' => $total - $postData['amount'],
            ];
            $this->savingMoneypository->create($data);
            $result['status'] = ApiStatus::transaction_history_success_status;
            $result['statusCode'] = ApiStatus::transaction_history_success_statusCode;
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::transaction_history_error_statusCode;
            $result['errCode'] = ApiStatus::transaction_history_error_status;
            $result['errDesc'] = ApiStatus::transaction_history_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
}
