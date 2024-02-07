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
    public function __construct(RewardCoinInterface $rewardCoinRepository )
    {
        $this->rewardCoinRepository = $rewardCoinRepository;
    }
    public function rewardCoin (Request $request)
    {
        try {
            $querys = $this->rewardCoinRepository->rewardCoin($request);
            foreach($querys as $query){
                $query->reward_image = "https://newhr.organicscosme.com/uploads/images/rewardcoin/".$query->reward_image;
            }
             if (count($querys) > 0 ){
                $result['status'] = ApiStatus::rewardCoin_success_status;
                $result['statusCode'] = ApiStatus::rewardCoin_success_statusCode;
                $result['data'] = $querys;
               }
               else{
                $result['status'] = ApiStatus::rewardCoin_failed_status;
                $result['errCode'] = ApiStatus::rewardCoin_failed_statusCode;
                $result['errDesc'] = ApiStatus::rewardCoin_failed_Desc;
                $result['message'] = $querys;
               }
        }catch(\Exception $ex) {
            $result['status'] = ApiStatus::rewardCoin_error_statusCode;
            $result['errCode'] = ApiStatus::rewardCoin_error_status;
            $result['errDesc'] = ApiStatus::rewardCoin_errDesc;
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }


    //////////   For Web   //////////

    public function getAll(Request $request){
        $postData = $request->all();
        ## Read value
        $draw = $postData['draw'];
        $start = $postData['start'];
        $rowperpage = $postData['length']; // Rows display per page

        $columnIndex = $postData['order'][0]['column']; // Column index
        $columnName = $postData['columns'][$columnIndex]['data']; // Column name
        $columnSortOrder = $postData['order'][0]['dir']; // asc or desc
        $searchValue = $postData['search']['value']; // Search value
        $param = [
            "columnName" => $columnName,
            "columnSortOrder" => $columnSortOrder,
            "searchValue" => $searchValue,
            "start" => $start,
            "rowperpage" => $rowperpage,
        ];


        // Total records
        $totalRecordswithFilter = $totalRecords = $this->rewardCoinRepository->getAll($param)->count();

        if (strlen($searchValue) > 0) {
            $totalRecordswithFilter = $this->rewardCoinRepository->getAll($param)->count();
        }

        // Fetch records
        $records = $this->rewardCoinRepository->paginate($param);

        return [
            "aaData" => $records,
            "draw" => $draw,
            "iTotalRecords" => $totalRecords,
            "iTotalDisplayRecords" => $totalRecordswithFilter,
        ];
    }

    public function create(Request $request)
    {
        DB::beginTransaction();
        try {
                $image = $request->file('reward_image');
                if(isset($image)){
                    $imageName = $image->getClientOriginalName();
                    $path_file = FileHelper::upload_path() . "/image_reward/";
                    $image->move($path_file, $imageName);
                    // Add the image filename to the data object before updating the user
                    $image_reward = $imageName;
                    $data=[
                        'reward_name' => $request->reward_name,
                        'reward_image' => $image_reward,
                        'reward_description' => $request->reward_description,
                        'reward_coins_change' => $request->reward_coins_change,
                    ];
                    $create = $this->rewardCoinRepository->create($data);
                    $result['status'] = "Success";
                    DB::commit();
                }else{
                    $data=[
                        'reward_name' => $request->reward_name,
                        'reward_image' => "",
                        'reward_description' => $request->reward_description,
                        'reward_coins_change' => $request->reward_coins_change,
                    ];
                    $create = $this->rewardCoinRepository->create($data);
                    $result['status'] = "Success";
                    DB::commit();
                }
                
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function update(Request $request)
    {
        DB::beginTransaction();
        $data = $request->all();
        $id = $data['id'];
        $result['status'] = "Success";
        try {
            $image = $request->file('reward_image');
            
            if(isset($image)){
                $imageName = $image->getClientOriginalName();
                    $path_file = FileHelper::upload_path() . "/image_reward/";
                    $image->move($path_file, $imageName);
                    // Add the image filename to the data object before updating the user
                    $image_reward = $imageName;
                    $data=[
                        'reward_name' => $request->reward_name,
                        'reward_image' => $image_reward,
                        'reward_description' => $request->reward_description,
                        'reward_coins_change' => $request->reward_coins_change,
                    ];
                    $create = $this->rewardCoinRepository->create($data);
                    $result['status'] = "Success";
                DB::commit();
            }else{
                $data=[
                    'reward_name' => $request->reward_name,
                    'reward_image' => "",
                    'reward_description' => $request->reward_description,
                    'reward_coins_change' => $request->reward_coins_change,
                ];
                $create = $this->rewardCoinRepository->create($data);
                $result['status'] = "Success";
                DB::commit();
            }
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function delete(Request $request)
    {
        DB::beginTransaction();
        $id = $request->id;
        $result['status'] = "Success";
        try {
            $this->rewardCoinRepository->delete($id);
            DB::commit();
        } catch (\Exception $ex){
            $result['status'] = "Failed";
            $result['message'] = $ex->getMessage();
            DB::rollBack();
        }
        return json_encode($result);
    }

    public function getById(Request $request)
    {
        $id = $request->id;
        return $this->rewardCoinRepository->find($id);
    }
}
