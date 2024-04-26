<?php

namespace App\Http\Controllers\APIs;

use App\Http\Controllers\Controller;
use App\Repositories\PickupToolsDeviceTypeInterface;
use Illuminate\Http\Request;

class PickupToolsDeviceTypeController extends Controller
{
    private $pickupToolsDeviceTypeRepository;
    public function __construct(PickupToolsDeviceTypeInterface $pickupToolsDeviceTypeRepository)
    {
        $this->pickupToolsDeviceTypeRepository = $pickupToolsDeviceTypeRepository;
    }

    public function create(Request $request)
    {
        $data = $request->all();
        $result = [];
        try {
            $save_data = [
                'device_types_name' => $data['device_types_name'],
                'unit' => $data['unit'],
            ];
            if ($request->file('image')) {
                $save_data['image'] = save_image($request->file('image'), 500, '/images/setting/pickuptools/');
            }
            $this->pickupToolsDeviceTypeRepository->create($save_data);

            $result['status'] = "success";
        } catch (\Exception $ex) {
            $result['status'] = "failed";
            $result['message'] = $ex->getMessage();
        }
        return $result;
    }
}
