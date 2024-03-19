<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\PrivateCarInterface;


class PrivateCarController extends Controller
{
    private $privateCarRepository;
    public function __construct(PrivateCarInterface $privateCarRepository)
    {
        $this->privateCarRepository = $privateCarRepository;
    }

    public function getPrivatecar(Request $request)
    {
        $data = $request->all();
        $getPrivatecar = $this->privateCarRepository->getPrivatecar($data);
        return $getPrivatecar;
    }
}
