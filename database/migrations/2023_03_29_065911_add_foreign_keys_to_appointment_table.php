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
        Schema::table('appointment', function (Blueprint $table) {
            $table->foreign('doctor_id','fk_appointment_to_doctor')
            ->references('id')
            ->on('doctor')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreign('user_id','fk_appointment_to_users')
            ->references('id')
            ->on('users')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');

            $table->foreign('konsultasi_id','fk_appointment_to_konsultasi')
            ->references('id')
            ->on('konsultasi')
            ->onUpdate('CASCADE')
            ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('appointment', function (Blueprint $table) {
            $table->dropForeign('fk_appointment_to_doctor');
            $table->dropForeign('fk_appointment_to_users');
            $table->dropForeign('fk_appointment_to_konsultasi');

        });
    }
};
