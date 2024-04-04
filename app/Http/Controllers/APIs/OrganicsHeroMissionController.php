<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\OrganicsHeroMissionInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class OrganicsHeroMissionController extends Controller
{
    private $organicsHeroMissionRepository;
    public function __construct(OrganicsHeroMissionInterface $organicsHeroMissionRepository)
    {
        $this->organicsHeroMissionRepository = $organicsHeroMissionRepository;
    }


}
