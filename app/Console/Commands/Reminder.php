<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\MedicationReminder;
use App\Models\MedicationSchedule;
use Illuminate\Support\Facades\Mail;

class Reminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'medication:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminder to patients to take their meds';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Fetch all medication schedules where the medication time is equal to the current time
        $current_time = now('Africa/Lagos')->format('H:i:s');
        $schedules = MedicationSchedule::where('medication_time', $current_time)->get();

        // Send email reminders for each schedule
        foreach ($schedules as $schedule) {
            $user = $schedule->user; 
                      
            Mail::to($user->email)->send(new MedicationReminder($schedule));
        }
        $this->info('Medication Reminders has been sent successfully');
    }
}
