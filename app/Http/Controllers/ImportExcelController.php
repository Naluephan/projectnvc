<?php

namespace App\Http\Controllers;

use App\Repositories\EmployeeInterface;
use Illuminate\Http\Request;

class ImportExcelController extends Controller
{
    private $employeeRepository;
    public function __construct(EmployeeInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }


    public function viewImport(Request $request){
       return view('upload.import') ;
    }
    public function importExcel(Request $request)
    {
        return $this->employeeRepository->saveExcel($request->excel);
    }

    public function viewImportUpdate(Request $request){
        return view('upload.importupdate') ;
     }
    
     public function importUpdateCardID(Request $request)
    {
        return $this->employeeRepository->saveExcelUpdate($request->excel);
    }
}
