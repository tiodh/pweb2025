<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\StudentOrganization;

class StudentOrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudentOrganization::create([
            'name' => 'Badan Eksekutif Mahasiswa',
            'type' => 'Lembaga Eksekutif Mahasiswa',
            'established_year' => 2015,
            'advisor_id' => 1,
        ]);

        StudentOrganization::create([
            'name' => 'Badan Perwakilan Mahasiswa',
            'type' => 'Lembaga Legislatif Mahasiswa',
            'established_year' => 2015,
            'advisor_id' => 2,
        ]);

        StudentOrganization::create([
            'name' => 'Himpunan Mahasiswa Informatika',
            'type' => 'HIMA',
            'established_year' => 2018,
            'advisor_id' => 2,
        ]);

        StudentOrganization::create([
            'name' => 'Himpunan Mahasiswa Sistem Informasi',
            'type' => 'HIMA',
            'established_year' => 2009,
            'advisor_id' => 3,
        ]);

        StudentOrganization::create([
            'name' => 'Linux and Open Source (LAOS)',
            'type' => 'UKM',
            'established_year' => 2009,
            'advisor_id' => 4,
        ]);

        StudentOrganization::create([
            'name' => 'Al-Azhar',
            'type' => 'UKM',
            'established_year' => 2011,
            'advisor_id' => 4,
        ]);        
    }
}
