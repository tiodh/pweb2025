<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\OrganizationMember;

class OrganizationMembersSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'organization_id' => 1,
                'student_id' => 1,
                'position' => 'Ketua',
                'period' => '2024-2025',
            ],
            [
                'organization_id' => 1,
                'student_id' => 2,
                'position' => 'Wakil Ketua',
                'period' => '2024-2025',
            ],
            [
                'organization_id' => 2,
                'student_id' => 3,
                'position' => 'Sekretaris',
                'period' => '2024-2025',
            ],
            [
                'organization_id' => 2,
                'student_id' => 4,
                'position' => 'Bendahara',
                'period' => '2024-2025',
            ],
        ];

        foreach ($data as $item) {
            OrganizationMember::create($item);
        }
    }
}
