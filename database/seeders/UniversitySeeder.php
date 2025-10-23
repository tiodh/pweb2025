<?php

namespace Database\Seeders;

use App\Models\University;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        University::firstOrCreate([
            'name'=>'Universitas Jember',
            'address'=>'Jl. Kalimantan No.37',
            'phone'=>'0331-330224',
            'email'=>'humas@unej.ac.id'
        ]);

        University::firstOrCreate([
            'name'=>'Politeknik Negeri Jember',
            'address'=>'Jl. Mastrip',
            'phone'=>'0331-333533',
            'email'=>'humas@polije.ac.id'
        ]);
    }
}
