<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicationSchedule extends Model
{
    use HasFactory;

    protected $fillable = [
         'user_id', 'medication_name', 'dosage', 'unit', 'medication_cycle', 'start_date', 'end_date', 'description', 'medication_time', 'notification_preferences'
    ];

    //Relationship to user
    public function user() {
        return $this->belongsTo(User::class, 'user_id');
    }
    
}
