<?php

namespace App\Http\Controllers\APIs;

use App\Repositories\ReserveFundInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReserveFundController extends Controller
{
    private $reservefundRepository;
    public function __construct(ReserveFundInterface $reservefundRepository)
    {
        $this->reservefundRepository = $reservefundRepository;
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
            $this->reservefundRepository->findBy($search_criteria);
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'reserve_fund_number' => $data['reserve_fund_number'],
                    'saving_rate' => $data['saving_rate'],
                    'day' => $data['day'],
                    'month' => $data['month'],
                    'year' => $data['year'],
                    'reserve' => $data['reserve'],
                    'contribution' => $data['contribution'],
                    'total_month' => $data['total_month'],
                    'accumulate_balance' => $data['accumulate_balance'],

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
      

    public function deleteUpdate(Request $request)
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
}
