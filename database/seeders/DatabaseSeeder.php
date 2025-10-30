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
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@pweb.com',
            'password' => bcrypt('admin'), // set known password
        ]);

        $this->call(UniversitySeeder::class);
        $this->call(AcademicYearsSeeder::class);
        $this->call(StudyProgramSeeder::class);
        $this->call(ActivityLogSeeder::class);
        $this->call(DataChangeHistorySeeder::class);
        $this->call(ScholarshipSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(LecturersSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(LectureraccountsSeeder::class);
        $this->call(TuitionFeeSeeder::class);
        $this->call(PaymentSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(CoursesSeeder::class);
        $this->call(AlumniSeeder::class);
        // $this->call(ScheduleSeeder::class);
        // $this->call(TrainingParticipantSeeder::class);
        // $this->call(CourseRegistrationSeeder::class);
        $this->call(StudentOrganizationSeeder::class);
        $this->call(GradeSeeder::class);
        $this->call(TrainingSeeder::class);
        $this->call(ThesisDefensesSeeder::class);
        $this->call(ThesisExaminersSeeder::class);
        $this->call(ScholarshipRecipientsSeeder::class);
    }
}
