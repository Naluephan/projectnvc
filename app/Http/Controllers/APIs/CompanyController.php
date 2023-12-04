<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\CompanyInterface;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    private $companyRepository;
    public function __construct(CompanyInterface $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function getCompanies(Request $request){

        return $this->companyRepository->all();
    }
}
