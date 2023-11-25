<?php

namespace App\Http\Controllers;

use App\Models\MedicationSchedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Display all scheduled medications
        return MedicationSchedule::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate schedule inputs
        $creds = $request->validate([
            'medication_name' => 'required',
            'dosage' => 'required', 
            'unit' => 'required',
            'medication_cycle' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'medication_time' => 'required',
            'notification_preferences' => 'required'
        ]);

        $creds['user_id'] = null;

        // create medication schedule
        $schedule = MedicationSchedule::create($creds);

        // return the schedule
        return response([
            'error' => 0,
            'message' => 'Schedule created sucessfully',
            'schedule' => $schedule,
        ], 201);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MedicationSchedule  $medicationSchedule
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return one schedule
        $schedule = MedicationSchedule::findOrFail($id);
        return $schedule;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MedicationSchedule  $medicationSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        // validate schedule inputs
        $creds = $request->validate([
            'medication_name' => 'required',
            'dosage' => 'required', 
            'unit' => 'required',
            'medication_cycle' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'description' => 'required',
            'medication_time' => 'required',
            'notification_preferences' => 'required'
        ]);

        $creds['user_id'] = null;

        // Find the schedule by ID
        $schedule = MedicationSchedule::findOrFail($id);

        // Update medication schedule
        $schedule->update($creds);

        // return the schedule
        return response([
            'error' => 0,
            'message' => 'Schedule updated sucessfully',
            'schedule' => $schedule
        ], 201);

    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MedicationSchedule  $medicationSchedule
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Find the schedule by ID
        $schedule = MedicationSchedule::findOrFail($id);

        // Delete the schedule
        $schedule->delete();

        return response([
            'error' => 0,
            'message' => 'Schedule deleted sucessfully'
        ], 201);
        
    }
}
