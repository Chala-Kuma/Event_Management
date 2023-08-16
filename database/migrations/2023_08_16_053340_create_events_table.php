<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */










    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->longText("descripton");
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->dateTime("registration_start_date");
            $table->dateTime("registration_end_date");
            $table->string("location");
            $table->string("hall");
            $table->string("event_type");
            $table->string("event_status");
            $table->integer("available_tickets");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
