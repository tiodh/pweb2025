<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\lecturers;
use App\Models\lectureraccounts;
use App\Models\User;

class LectureraccountsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $lecturer = Lecturers::first();
        $user = User::first(); // Ambil user pertama jika ada

        if ($lecturer) {
            Lectureraccounts::create([
                'user_id' => $user?->id, // aman walau null
                'lecturer_id' => $lecturer->id,
                'status' => 'active',
            ]);
    }
}
}