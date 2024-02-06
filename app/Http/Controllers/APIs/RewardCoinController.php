<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RewardCoinInterface;
use Illuminate\Support\Facades\DB;


class RewardCoinController extends Controller
{
    private $rewardCoinRepository;
    public function __construct(RewardCoinInterface $rewardCoinRepository )
    {
        $this->rewardCoinRepository = $rewardCoinRepository;
    }
    public function rewardCoin (Request $request)
    {
        try {
            $data = $request->all();
            $query = $this->rewardCoinRepository->rewardCoin($data);

            // $result = [
            //     'id' => $query ['id'],
            //     'reward_name' => $query ['reward_name'],
            //     'reward_image' => $query ['reward_image'],
            //     'reward_description' => $query ['reward_description'],
            //     'reward_coins_change' => $query ['reward_coins_change'],
            // ];

            $result = $query;
        }catch(\Exception $ex) {
            $result['status'] = ApiStatus::rewardCoin_error_statusCode;
            $result['errCode'] = ApiStatus::rewardCoin_error_status;
            $result['errDesc'] = ApiStatus::rewardCoin_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
