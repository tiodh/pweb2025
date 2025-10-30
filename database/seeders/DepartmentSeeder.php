<?php

namespace Database\Seeders;

use App\Models\Faculty;
use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faculty = Faculty::first();

        if ($faculty) {
            Department::create([
                'faculty_id' => $faculty->id,
                'name' => 'Teknologi Informasi',
                'department_code' =>'TI',
                'head_of_department' => 'raja jawa'
            ]);
        }
        else{
            $this->command->error("tabel fakultas belum dibuat");
        }
    }
}
