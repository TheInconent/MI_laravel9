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
        Schema::create('appointment', function (Blueprint $table) {
            $table->id();
            $table->foreignId('doctor_id')->nullable()->index('fk_appointment_to_doctor');
            $table->foreignId('user_id')->nullable()->index('fk_appointment_to_users');
            $table->foreignId('konsultasi_id')->nullable()->index('fk_appointment_to_konsultasi');
            $table->enum('level', [1,2,3]);
            $table->date('date');
            $table->time('time');
            $table->enum('status', [1,2]);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointment');
    }
};