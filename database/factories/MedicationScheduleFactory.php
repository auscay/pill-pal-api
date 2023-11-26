<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MedicationSchedule>
 */
class MedicationScheduleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'medication_name' => $this->faker->word,
            'dosage' => $this->faker->randomNumber(2),
            'unit' => $this->faker->randomNumber(1),
            'medication_cycle' => $this->faker->word,
            'start_date' => $this->faker->date,
            'end_date' => $this->faker->date,
            'description' => $this->faker->text,
            'medication_time' => $this->faker->time,
            'notification_preferences' => $this->faker->boolean
        ];
    }
}
