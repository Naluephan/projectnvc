<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\TransactionHistoryInterface;
use Illuminate\Http\Request;

class TransactionHistoryController extends Controller
{
    private $transactionHistoriesRepository;

    public function __construct(
        TransactionHistoryInterface $transactionHistoriesRepository
    ) {
        $this->transactionHistoriesRepository = $transactionHistoriesRepository;
    }

    public function transactionListApp(Request $request)
    {
        try {
            $data = $request->all();

            $transaction_data = $this->transactionHistoriesRepository->transactionListApp($data);
            if (count($transaction_data) > 0) {
                $result['status'] = ApiStatus::transaction_history_success_status;
                $result['statusCode'] = ApiStatus::transaction_history_success_statusCode;
                $result['data'] = $transaction_data;
            }else{
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
}
