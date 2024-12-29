<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Student;
use App\Models\DegreePlan;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Temporarily disable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Truncate the tables to start fresh
        DB::table('course_completions')->truncate();
        DB::table('students')->truncate();
        DB::table('degree_plans')->truncate();
        DB::table('users')->truncate();

        // Re-enable foreign key checks
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Create a test user
        $user = User::create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => bcrypt('password'),
            'role' => 'student'
        ]);

        // Create a student linked to the user
        $student = Student::create([
            'user_id' => $user->id,
            'matric_number' => 'A21CS1234'
        ]);

        // Create a degree plan for the student
        $degreePlan = DegreePlan::create([
            'student_id' => $student->id,
            'name' => 'Bachelor of Computer Science (Software Engineering)'
        ]);

        // Assign the degree plan id back to the student if necessary
        $student->degree_plan_id = $degreePlan->id;
        $student->save();

        // You can also create additional random users if needed
        // User::factory(10)->create();
    }
}


