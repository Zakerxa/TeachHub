<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use HasFactory;
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

        // Seed locations and subjects
        \App\Models\Subject::factory(5)->create();
        \App\Models\Location::factory(5)->create();
        \App\Models\Teacher::factory(10)->create()->each(function ($teacher) {
            $teacher->subjects()->attach(\App\Models\Subject::pluck('id')->random());
            $teacher->locations()->attach(\App\Models\Location::pluck('id')->random(), ['township' => 'Random Township']);
        });
    }
}
