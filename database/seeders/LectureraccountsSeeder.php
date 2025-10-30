<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\lecturers;
use App\Models\lectureraccounts;
use App\Models\User;

class LectureraccountsSeeder extends Seeder
{
    public function run(): void
    {
        $lecturer = lecturers::first();
        $user = User::first();

        if ($lecturer) {
            lectureraccounts::create([
                'user_id' => $user?->id,
                'lecturer_id' => $lecturer->id,
                'status' => 'active',
            ]);
        }
    }
}
