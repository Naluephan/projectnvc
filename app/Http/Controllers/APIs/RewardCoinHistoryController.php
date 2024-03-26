<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\RewardCoinHistoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
}
