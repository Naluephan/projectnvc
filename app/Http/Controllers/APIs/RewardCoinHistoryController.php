<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\RewardCoinHistoryInterface;
use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;
use App\Models\RewardCoin;
use App\Models\Employee;


class RewardCoinHistoryController extends Controller
{
    private $rewardCoinHistoryRepository, $employeeRepository;
    public function __construct(RewardCoinHistoryInterface $rewardCoinHistoryRepository, EmployeeInterface $employeeRepository)
    {
        $this->rewardCoinHistoryRepository = $rewardCoinHistoryRepository;
        $this->employeeRepository = $employeeRepository;
    }

    public function reward_history(Request $request)
    {
        $data = $request->all();
        $reward_history = $this->rewardCoinHistoryRepository->getAll($data);
        return response()->json($reward_history);
    }

    public function rewardCoinById(Request $request)
    {
        $data = $request->all();
        try {
            $querys = $this->rewardCoinHistoryRepository->findBy($data);
            if (count($querys) > 0) {
                $result['status'] = ApiStatus::reward_coin_history_success_status;
                $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
                $result['data'] = $querys;
            } else {
                $result['status'] = ApiStatus::reward_coin_history_failed_status;
                $result['errCode'] = ApiStatus::reward_coin_history_failed_statusCode;
                $result['errDesc'] = ApiStatus::reward_coin_history_failed_Desc;
                $result['message'] = $querys;
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::reward_coin_history_error_statusCode;
            $result['errCode'] = ApiStatus::reward_coin_history_error_status;
            $result['errDesc'] = ApiStatus::reward_coin_history_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    public function approve(Request $request)
    {
        try {
            $data = $request->all();

            $rewardCoinHistory = $this->rewardCoinHistoryRepository->findById($data['id']);

            $employeeData = $this->employeeRepository->findById($data['emp_id']);

            $saveData = [
                'status_approved' => 2,
            ];
            $this->rewardCoinHistoryRepository->update($data['id'], $saveData);

            $employeeData->coins -= $rewardCoinHistory->reward_coins_change;
            $employeeData->save();

            $result = [
                'status' => ApiStatus::reward_coin_history_success_status,
                'statusCode' => ApiStatus::reward_coin_history_success_statusCode,
                'message' => 'Transaction approved successfully.'
            ];
        } catch (\Exception $e) {
            $result['status'] = ApiStatus::reward_coin_history_failed_status;
            $result['errCode'] = ApiStatus::reward_coin_history_failed_statusCode;
            $result['errDesc'] = ApiStatus::reward_coin_history_failed_Desc;
            $result['message'] = $e->getMessage();
        }
        return $result;
    }


    public function create(Request $request)
    {
        $result = [];

        try {
            $data = $request->all();

            $rewardCoin = RewardCoin::find($data['reward_coin_id']);

            $employeeData = $this->employeeRepository->findById($data['emp_id']);
            $hasEnoughCoins = $employeeData->coins >= $rewardCoin->reward_coins_change;

            if ($hasEnoughCoins) {
                $saveData = [
                    'emp_id' => $data['emp_id'],
                    'company_id' => $employeeData->company_id,
                    'department_id' => $employeeData->department_id,
                    'reward_name' => $rewardCoin->reward_name,
                    'reward_coins_change' => $rewardCoin->reward_coins_change,
                    'reward_image' => $rewardCoin->reward_image,
                    'status_approved' => 0,
                ];

                $this->rewardCoinHistoryRepository->create($saveData);

                // $employeeData->coins -= $rewardCoin->reward_coins_change;
                // $employeeData->save();

                $result['status'] = ApiStatus::reward_coin_history_success_status;
                $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
            } else {
                $result['status'] = ApiStatus::reward_coin_history_error_status;
                $result['statusCode'] = ApiStatus::reward_coin_history_error_statusCode;
                $result['message'] = 'Employee does not have enough coins.';
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::reward_coin_history_error_status;
            $result['statusCode'] = ApiStatus::reward_coin_history_error_statusCode;
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }
}
