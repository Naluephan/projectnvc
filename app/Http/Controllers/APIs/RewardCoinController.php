<?php

namespace App\Http\Controllers\APIs;

use App\Helpers\FileHelper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\RewardCoinInterface;
use Illuminate\Support\Facades\DB;


class RewardCoinController extends Controller
{
    private $rewardCoinRepository;
    public function __construct(RewardCoinInterface $rewardCoinRepository)
    {
        $this->rewardCoinRepository = $rewardCoinRepository;
    }
    public function rewardCoin(Request $request)
    {
        try {
            $querys = $this->rewardCoinRepository->rewardCoin($request);
            foreach ($querys as $query) {
                $query->reward_image = "https://newhr.organicscosme.com/uploads/images/rewardcoin/" . $query->reward_image;
            }
            if (count($querys) > 0) {
                $result['status'] = ApiStatus::rewardCoin_success_status;
                $result['statusCode'] = ApiStatus::rewardCoin_success_statusCode;
                $result['data'] = $querys;
            } else {
                $result['status'] = ApiStatus::rewardCoin_failed_status;
                $result['errCode'] = ApiStatus::rewardCoin_failed_statusCode;
                $result['errDesc'] = ApiStatus::rewardCoin_failed_Desc;
                $result['message'] = $querys;
            }
        } catch (\Exception $ex) {
            $result['status'] = ApiStatus::rewardCoin_error_statusCode;
            $result['errCode'] = ApiStatus::rewardCoin_error_status;
            $result['errDesc'] = ApiStatus::rewardCoin_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }


    //////////   For Web   //////////

    public function getAll(Request $request)
    {
        // $postData = $request->all();
        // ## Read value
        // $draw = $postData['draw'];
        // $start = $postData['start'];
        // $rowperpage = $postData['length']; // Rows display per page

        // $columnIndex = $postData['order'][0]['column']; // Column index
        // $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        // $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        // $searchValue = $postData['search']['value']; // Search value
        // $param = [
        //     "columnName" => $columnName,
        //     "columnSortOrder" => $columnSortOrder,
        //     "searchValue" => $searchValue,
        //     "start" => $start,
        //     "rowperpage" => $rowperpage,
        // ];


        // // Total records
        // $totalRecordswithFilter = $totalRecords = $this->rewardCoinRepository->getAll($param)->count();

        // if (strlen($searchValue) > 0) {
        //     $totalRecordswithFilter = $this->rewardCoinRepository->getAll($param)->count();
        // }

        // // Fetch records
        // $records = $this->rewardCoinRepository->paginate($param);

        // return [
        //     "aaData" => $records,
        //     "draw" => $draw,
        //     "iTotalRecords" => $totalRecords,
        //     "iTotalDisplayRecords" => $totalRecordswithFilter,
        // ];

        return $this->rewardCoinRepository->rewardCoin($request);
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $result = [];
        try {
            $save_data = [
                'reward_name' => $data['reward_name'],
                'reward_coins_change' => $data['reward_coins_change'],
            ];
            if ($request->file('reward_image')) {
                $save_data['reward_image'] = save_image($request->file('reward_image'), 500, '/images/setting/itemOrganicsCoins/');
            }
            $this->rewardCoinRepository->create($save_data);

            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return $result;
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $result = [];
        $data = $request->all();
        try {
            if ($request->file('reward_image')) {
                $data['reward_image'] = save_image($request->file('reward_image'), 500, '/images/setting/itemOrganicsCoins/');
            }
            $update = $this->rewardCoinRepository->update($data['id'], $data);
            $result['status'] = "success";
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex;
            DB::rollBack();
        }
        return $result;
    }


    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->rewardCoinRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex) {
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $postData = $request->all();
        $result = [];

        try {
            $securityList = $this->rewardCoinRepository->find($postData['id']);
            $result['status'] = "success";
            $result['data'] = $securityList;
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }

        return $result;
    }

    public function reward_list(Request $request)
    {
        try {
            $data = $request->all();
            $querys = $this->rewardCoinRepository->rewardCoin($data);

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
