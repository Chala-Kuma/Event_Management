<?php

use App\Models\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->cascadeOnDelete();
            $table->string("title");
            $table->longText("descripton");
            $table->dateTime("start_date");
            $table->dateTime("end_date");
            $table->dateTime("registration_start_date");
            $table->dateTime("registration_end_date");
            $table->string("location");
            $table->string("hall");
            $table->boolean("event_type")->default(Event::OPEN);
            $table->string("event_status")->default(Event::UP_COMING);
            $table->integer("available_seat");
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
