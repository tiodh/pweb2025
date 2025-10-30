<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StudentOrganization;

class StudentOrganizationSeeder extends Seeder
{
    public function run(): void
    {
        $organizations = [
            [
                'name' => 'Badan Eksekutif Mahasiswa (BEM)',
                'type' => 'Eksekutif',
                'established_year' => 2010,
                'advisor_id' => 1, // pastikan ada dosen dengan ID 1 di tabel lecturers
            ],
            [
                'name' => 'Himpunan Mahasiswa Informatika (HMIF)',
                'type' => 'Akademik',
                'established_year' => 2012,
                'advisor_id' => 1,
            ],
            [
                'name' => 'Unit Kegiatan Mahasiswa Musik (UKM Musik)',
                'type' => 'Minat Bakat',
                'established_year' => 2015,
                'advisor_id' => 1,
            ],
            [
                'name' => 'Unit Kegiatan Mahasiswa Olahraga (UKM Olahraga)',
                'type' => 'Minat Bakat',
                'established_year' => 2013,
                'advisor_id' => 1,
            ],
        ];

        foreach ($organizations as $org) {
            StudentOrganization::create($org);
        }

        $this->command->info('Seeder StudentOrganizationSeeder berhasil dijalankan!');
    }
}
