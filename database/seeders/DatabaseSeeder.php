<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use App\Models\MedicationSchedule;
use Database\Factories\ScheduleFactory;
use Illuminate\Console\Scheduling\Schedule;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
        
        MedicationSchedule::factory(10)->create([
            'user_id' => $user->id
        ]);

       
        $this->call([
            RoleSeeder::class,
            UsersSeeder::class,
        ]);
    }
}
