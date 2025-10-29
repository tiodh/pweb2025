<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::create([
            'name' => 'PT. Teknologi Nusantara',
            'address' => 'Jl. Sudirman Kav. 50, Jakarta Pusat',
            'contact' => '021-555-1234',
            'email' => 'hr@teknus.co.id'
        ]);

        Company::create([
            'name' => 'CV. Mitra Abadi',
            'address' => 'Jl. Pahlawan No. 45, Surabaya',
            'contact' => '031-777-5678',
            'email' => 'info@mitraabadi.com'
        ]);

        Company::create([
            'name' => 'PT. Solusi Digital Kreatif',
            'address' => 'Jl. Asia Afrika No. 101, Bandung',
            'contact' => '022-420-9988',
            'email' => 'careers@solusikreatif.id'
        ]);

        Company::create([
            'name' => 'PT. Cipta Karya Bangsa',
            'address' => 'Jl. Gajah Mada No. 30, Yogyakarta',
            'contact' => '0274-500-1111',
            'email' => 'kontak@ciptakarya.com'
        ]);
    }
}