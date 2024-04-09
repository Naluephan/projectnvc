<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\RewardCoinHistoryInterface;
use Illuminate\Http\Request;
use App\Models\RewardCoin;

class RewardCoinHistoryController extends Controller
{
    private $rewardCoinHistoryRepository;
    public function __construct(RewardCoinHistoryInterface $rewardCoinHistoryRepository )
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

    public function create(Request $request)
    {
        try {
            $data = $request->all();

            $rewardCoin = RewardCoin::find($data['reward_coin_id']);

            if ($rewardCoin) {
                $save_data = [
                    'emp_id' => $data['emp_id'],
                    'reward_name' => $rewardCoin->reward_name,
                    'reward_coins_change' => $rewardCoin->reward_coins_change,
                    'reward_image' => $rewardCoin->reward_image,
                ];

                $this->rewardCoinHistoryRepository->create($save_data);

                $result['status'] = ApiStatus::reward_coin_history_success_status;
                $result['statusCode'] = ApiStatus::reward_coin_history_success_statusCode;
                $result['data'] = 'Create Successfully.';
            } else {
                $result['status'] = ApiStatus::reward_coin_history_failed_status;
                $result['errCode'] = ApiStatus::reward_coin_history_failed_statusCode;
                $result['errDesc'] = ApiStatus::reward_coin_history_failed_Desc;
                $result['message'] = 'Reward coin with provided ID not found.';
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::reward_coin_history_error_statusCode;
            $result['errCode'] = ApiStatus::reward_coin_history_error_status;
            $result['errDesc'] = ApiStatus::reward_coin_history_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
