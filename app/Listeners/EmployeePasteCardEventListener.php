<?php

namespace App\Listeners;

use App\Events\EmployeePasteCardEvent;
use App\Repositories\EmployeeInterface;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Pusher\Pusher;

class EmployeePasteCardEventListener implements ShouldQueue
{
    use InteractsWithQueue;

    protected $pusher;
    private $employeeRepository;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Pusher $pusher
        , EmployeeInterface $employeeRepository
    )
    {
        $this->pusher = $pusher;
        $this->employeeRepository = $employeeRepository;
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\EmployeePasteCardEvent  $event
     * @return void
     */
    public function handle(EmployeePasteCardEvent $event)
    {
        $empId = $event->employeeData['emp_id'];
        try {
            // Broadcast the event to a Pusher channel
            // $data['empId'] = 'hello '.$empId;
            $data = $this->employeeRepository->getUserProfile($empId);
            if (isset($data)) {
                $data->ocoin = 0;
                $data->paste_date = $event->employeeData['paste_date'];
            }
            $this->pusher->trigger('organics-hr', 'employee-paste-card', $data);
        } catch (\Exception $e) {
            // Handle any errors that occur during broadcasting
            Log::error('Pusher broadcasting error: ' . $e->getMessage());
        }
    }
}
