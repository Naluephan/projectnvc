<?php

namespace App\Http\Controllers\APIs;

use App\Repositories\ReserveFundInterface;
use App\Http\Controllers\Controller;
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
        $id = $request->id;
        return $this->reservefundRepository->find($id);
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
    public function  createWithdraw(Request $request)
    {
        $postData = $request->all();
        try {
            $this->withdrawreservefundRepository->findAmountByEmpId($postData['user_id']);

                $data = [
                    'emp_id' => $postData['user_id'],
                    'reserse_fund_id' => $postData['reserse_fund_id'],
                    'reserse_fund_detail' => $postData['reserse_fund_detail'],
                    
                ];
                $this->withdrawreservefundRepository->create($data);
                $result['status'] = ApiStatus::reverse_fund_success_status;
                $result['statusCode'] = ApiStatus::reverse_fund_success_statusCode;
            
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::reverse_fund_error_status;
            $result['errCode'] = ApiStatus::reverse_fund_error_statusCode;
            $result['errDesc'] = ApiStatus::reverse_fund_errDesc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }
    public function getwithdraw(Request $request)
    {
        try {
            $data = $request->all();
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

}
