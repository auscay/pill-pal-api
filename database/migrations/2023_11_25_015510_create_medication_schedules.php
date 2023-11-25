<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('medication_name');
            $table->integer('dosage');
            $table->string('unit');
            $table->string('medication_cycle');
            $table->date('start_date');
            $table->date('end_date');
            $table->longText('description');
            $table->time('medication_time');
            $table->string('notification_preferences');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medication_schedules');
    }
};
