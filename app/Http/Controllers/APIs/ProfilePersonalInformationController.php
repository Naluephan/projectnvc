<?php

namespace App\Http\Controllers\APIs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\PersonalInformationInterface;
use Illuminate\Support\Facades\DB;

class ProfilePersonalInformationController extends Controller
{
    private $PersonalInformationRepository;
    public function __construct(PersonalInformationInterface $PersonalInformationRepository)
    {
        $this->PersonalInformationRepository = $PersonalInformationRepository;
    }
    public function getById(Request $request)
    {
        // $id = $request->id;
        // return $this->PersonalInformationRepository->find($id);
        $getInfo  = $this->PersonalInformationRepository->selectCustomData(null, $whereOr);

    }
}
