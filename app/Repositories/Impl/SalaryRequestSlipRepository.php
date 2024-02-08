<?php


namespace App\Repositories\Impl;

use App\Models\SalaryRequestSlip;
use App\Repositories\SalaryRequestSlipInterface;
use Illuminate\Support\Collection;

class SalaryRequestSlipRepository extends MasterRepository implements SalaryRequestSlipInterface
{
    protected $model;

    public function __construct(SalaryRequestSlip $model)
    {
        parent::__construct($model);
    }

    public function paginate($param): Collection
    {
        $monthTranslations = [
            '1' => 'มกราคม',
            '2' => 'กุมภาพันธ์',
            '3' => 'มีนาคม',
            '4' => 'เมษายน',
            '5' => 'พฤษภาคม',
            '6' => 'มิถุนายน',
            '7' => 'กรกฎาคม',
            '8' => 'สิงหาคม',
            '9' => 'กันยายน',
            '10' => 'ตุลาคม',
            '11' => 'พฤศจิกายน',
            '12' => 'ธันวาคม',
        ];

        return $this->model->with('employees')
            ->where('record_status', 1)
            ->orderBy('request_approve', 'asc')
            ->orderBy($param['columnName'], $param['columnSortOrder'])
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->orWhereHas('employees', function ($q) use ($param) {
                        $q->where('f_name', "like", '%' . $param['searchValue'] . '%');
                        $q->orWhere('l_name', "like", '%' . $param['searchValue'] . '%');
                    });
                }
            })
            ->select('*')
            ->skip($param['start'])
            ->take($param['rowperpage'])
            ->get()
            ->map(function ($item) use ($monthTranslations) {
                $item->month_request = collect(explode(',', $item->month_request))->map(function ($month) use ($monthTranslations) {
                    return $monthTranslations[$month];
                })->implode(', ');
                return $item;
            });
    }

    public function getAll($param): Collection
    {
        $monthTranslations = [
            '1' => 'มกราคม',
            '2' => 'กุมภาพันธ์',
            '3' => 'มีนาคม',
            '4' => 'เมษายน',
            '5' => 'พฤษภาคม',
            '6' => 'มิถุนายน',
            '7' => 'กรกฎาคม',
            '8' => 'สิงหาคม',
            '9' => 'กันยายน',
            '10' => 'ตุลาคม',
            '11' => 'พฤศจิกายน',
            '12' => 'ธันวาคม',
        ];

        return $this->model
            ->select('*')
            ->where(function ($q) use ($param) {
                if (isset($param['searchValue'])) {
                    $q->orWhereHas('employees', function ($q) use ($param) {
                        $q->where('f_name', "like", '%' . $param['searchValue'] . '%');
                        $q->orWhere('l_name', "like", '%' . $param['searchValue'] . '%');
                    });
                }
            })
            ->where('request_approve', 0)
            ->where('record_status', 1)
            ->with('employees')
            ->get()
            ->map(function ($item) use ($monthTranslations) {
                $item->month_request = collect(explode(',', $item->month_request))->map(function ($month) use ($monthTranslations) {
                    return $monthTranslations[$month];
                })->implode(', ');
                return $item;
            });
    }
}
