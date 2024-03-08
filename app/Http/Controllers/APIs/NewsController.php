<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\NewsInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsController extends Controller
{
    private $newsRepository;
    public function __construct(NewsInterface $newsRepository )
    {
        $this->newsRepository = $newsRepository;
    }

    public function news_list(Request $request)
    {
        try{
            $data = $request->all();
            $news_list = $this->newsRepository->getAll($data);
            if($news_list != null ){
             $result['status'] = ApiStatus::news_list_success_status;
             $result['statusCode'] = ApiStatus::news_list_success_statusCode;
             $result['news_list'] = $news_list;

            }else{
             $result['status'] = ApiStatus::news_list_failed_status;
             $result['errCode'] = ApiStatus::news_list_failed_statusCode;
             $result['errDesc'] = ApiStatus::news_list_failed_Desc;
             $result['message'] = $news_list;
             DB::rollBack();
            }
         } catch (\Exception $ex) {
             $result['status'] = ApiStatus::news_list_error_statusCode;
             $result['errCode'] = ApiStatus::news_list_error_status;
             $result['errDesc'] = ApiStatus::news_list_errDesc;
             $result['message'] = $ex->getMessage();
             DB::rollBack();
         }
         return $result;
    }
}
