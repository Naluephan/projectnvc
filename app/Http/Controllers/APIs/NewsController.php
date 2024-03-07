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
        $data = $request->all();
        $news_list = $this->newsRepository->getAll($data);
        return response()->json($news_list);
    }
}
