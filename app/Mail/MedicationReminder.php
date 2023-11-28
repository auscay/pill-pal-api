<?php

namespace App\Mail;

use App\Models\MedicationSchedule;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MedicationReminder extends Mailable
{
    use Queueable, SerializesModels;

    public $schedule;

    /**
     * Create a new message instance.
     *
     * @param MedicationSchedule $schedule
     */
    public function __construct(MedicationSchedule $schedule)
    {
        $this->schedule = $schedule;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->subject('Medication Reminder')
            ->view('emails.medication-reminder')
            ->with([
                'medication_name' => $this->schedule->medication_name,
                'dosage' => $this->schedule->dosage,
                'medication_time' => $this->schedule->medication_time,
                // Add any other fields you want to include in the email
            ]);
    }
}
