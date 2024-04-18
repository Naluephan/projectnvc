<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\RewardCoinHistoryInterface;
use Illuminate\Http\Request;
use App\Models\RewardCoin;

class RewardCoinHistoryController extends Controller
{
    private $rewardCoinHistoryRepository;
    public function __construct(RewardCoinHistoryInterface $rewardCoinHistoryRepository)
    {
        $this->rewardCoinHistoryRepository = $rewardCoinHistoryRepository;
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
        $data = $request->all();
        $id = $data['id'];
        try {
            $this->rewardCoinHistoryRepository->update($id, $data);
            $result['status'] = ApiStatus::reward_coin_history_success_status;
            $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
            $result['message'] = 'Transaction approved successfully.';
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
        try {
            $data = $request->all();

            $rewardCoin = RewardCoin::find($data['reward_coin_id']);

            if ($rewardCoin) {

                if ($rewardCoin->reward_coins_change <= 1000) {
                    $save_data = [
                        'emp_id' => $data['emp_id'],
                        'company_id' => $data['company_id'],
                        'department_id' => $data['department_id'],
                        'reward_name' => $rewardCoin->reward_name,
                        'reward_coins_change' => $rewardCoin->reward_coins_change,
                        'reward_image' => $rewardCoin->reward_image,
                    ];
                    $this->rewardCoinHistoryRepository->create($save_data);

                    $result['status'] = ApiStatus::reward_coin_history_success_status;
                    $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
                    $result['message'] = 'Create General Products Successfully.';
                } elseif ($rewardCoin->reward_coins_change > 1000) {
                    $save_data = [
                        'emp_id' => $data['emp_id'],
                        'company_id' => $data['company_id'],
                        'department_id' => $data['department_id'],
                        'reward_name' => $rewardCoin->reward_name,
                        'reward_coins_change' => $rewardCoin->reward_coins_change,
                        'reward_image' => $rewardCoin->reward_image,
                        'type_reward_id' => 2,
                        'status_display' => 3,
                    ];
                    $this->rewardCoinHistoryRepository->create($save_data);

                    $result['status'] = ApiStatus::reward_coin_history_success_status;
                    $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
                    $result['message'] = 'Create Special Products Successfully.';
                }
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::reward_coin_history_error_statusCode;
            $result['errCode'] = ApiStatus::reward_coin_history_error_status;
            $result['errDesc'] = ApiStatus::reward_coin_history_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }

    // public function create(Request $request)
    // {
    //     try {
    //         $data = $request->all();

    //         if (isset($data['reward_coin_id']) && isset($data['type_reward'])) {
    //             $rewardCoin = RewardCoin::find($data['reward_coin_id']);

    //             if ($rewardCoin) {
    //                 $base_data = [
    //                     'emp_id' => $data['emp_id'],
    //                     'type_reward' => $data['type_reward'],
    //                 ];

    //                 if ($base_data['type_reward'] == 1) {
    //                     $save_data = [
    //                         'emp_id' => $data['emp_id'],
    //                         'type_reward' => $data['type_reward'],
    //                         'reward_name' => $rewardCoin->reward_name,
    //                         'reward_coins_change' => $rewardCoin->reward_coins_change,
    //                         'reward_image' => $rewardCoin->reward_image,
    //                     ];
    //                     $this->rewardCoinHistoryRepository->create($save_data);

    //                     $result['status'] = ApiStatus::reward_coin_history_success_status;
    //                     $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
    //                     $result['message'] = 'Create General Products Successfully.';
    //                 } elseif ($base_data['type_reward'] == 2) {
    //                     $save_data = [
    //                         'emp_id' => $data['emp_id'],
    //                         'type_reward' => $data['type_reward'],
    //                         'reward_name' => $rewardCoin->reward_name,
    //                         'reward_coins_change' => $rewardCoin->reward_coins_change,
    //                         'reward_image' => $rewardCoin->reward_image,
    //                         'status_display' => 3,
    //                     ];
    //                     $this->rewardCoinHistoryRepository->create($save_data);

    //                     $result['status'] = ApiStatus::reward_coin_history_success_status;
    //                     $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
    //                     $result['message'] = 'Create Special Products Successfully.';
    //                 } else {
    //                     $result['status'] = ApiStatus::reward_coin_history_failed_status;
    //                     $result['errCode'] = ApiStatus::reward_coin_history_failed_statusCode;
    //                     $result['errDesc'] = 'Invalid type_reward';
    //                     $result['message'] = 'Type reward not available as an option';
    //                 }
    //             } else {
    //                 $result['status'] = ApiStatus::reward_coin_history_failed_status;
    //                 $result['errCode'] = ApiStatus::reward_coin_history_failed_statusCode;
    //                 $result['errDesc'] = ApiStatus::reward_coin_history_failed_Desc;
    //                 $result['message'] = 'Reward coin with provided ID not found.';
    //             }
    //         } else {
    //             $result['status'] = ApiStatus::reward_coin_history_failed_status;
    //             $result['errCode'] = ApiStatus::reward_coin_history_failed_statusCode;
    //             $result['errDesc'] = 'Required data is missing in request';
    //             $result['message'] = 'reward_coin_id and type_reward are required in request data';
    //         }
    //     } catch (\Exception $ex) {
    //         $result['status'] = ApiStatus::reward_coin_history_error_statusCode;
    //         $result['errCode'] = ApiStatus::reward_coin_history_error_status;
    //         $result['errDesc'] = ApiStatus::reward_coin_history_errDesc;
    //         $result['message'] = $ex->getMessage();
    //     }
    //     return $result;
    // }
}
