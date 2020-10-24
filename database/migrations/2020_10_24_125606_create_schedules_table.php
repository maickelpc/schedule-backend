<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->id();
            $table->string('client_name',100);
            $table->string('client_email',100);
            $table->string('client_phone',20)->nullable();
            $table->string('subject',50);
            $table->text('meeting_agenda');
            $table->datetime('start_date');
            $table->datetime('end_date');
            $table->unsignedBigInteger('requester_id')->nullable();
            $table->enum('status', ['REQUESTED', 'CONFIRMED', 'REFUSED','CANCELED'])->default('REQUESTED');
            $table->timestamps();

            $table->foreign('requester_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedules');
    }
}
