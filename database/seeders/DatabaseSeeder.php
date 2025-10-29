<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@pweb.com',
            'password' => bcrypt('admin'), // set known password
        ]);

        $this->call([
            UniversitySeeder::class,
            FacultySeeder::class,
            DepartmentSeeder::class,
            StudyProgramSeeder::class,
            StudentAccountSeeder::class,
            AcademicYearsSeeder::class,
            ActivityLogSeeder::class,
            DataChangeHistorySeeder::class,
            ScholarshipSeeder::class,
            SemesterSeeder::class,
            LecturersSeeder::class,
            StudentSeeder::class,
            LectureraccountsSeeder::class,
            TuitionFeeSeeder::class,
            PaymentSeeder::class,
            CoursesSeeder::class,
            AlumniSeeder::class,
            ScheduleSeeder::class,
            // TrainingParticipantSeeder::class, // aktifkan jika diperlukan
            CourseRegistrationSeeder::class,
            CompanySeeder::class,
        ]);
    }
}
