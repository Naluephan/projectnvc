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
}
