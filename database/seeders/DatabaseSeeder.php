<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use App\Models\Event;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        \App\Models\Event::factory(10)->create([
            "title" =>"fake()->sentence()",
            "user_id" => 1,
            "descripton" => "fake()->paragraphs(5)",
            "start_date" => "23-08-29 00:00:00",
            "end_date" => "23-08-30 00:00:00",
            "registration_start_date" => "23-08-22 00:00:00",
            "registration_end_date" => "23-08-29 00:00:00",
            "location" => "fake()->word()",
            "hall" => "fake()->words()",
            "event_type" => 1,
            "event_status" => "up coming",
            "available_seat" => 3
        ]);
    }
}
