<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Menambahkan contoh pengguna dengan peran admin budaya
        User::create([
            'name' => 'Admin Budaya',
            'email' => 'budaya@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin_budaya',
        ]);

        // Menambahkan contoh pengguna dengan peran admin pendidikan
        User::create([
            'name' => 'Admin Pendidikan',
            'email' => 'pendidikan@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin_pendidikan',
        ]);

        // Menambahkan contoh pengguna dengan peran ekonomi
        User::create([
            'name' => 'Admin Ekonomi',
            'email' => 'ekonomi@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin_ekonomi',
        ]);

        // Menambahkan contoh pengguna dengan peran e-gov
        User::create([
            'name' => 'Admin E-Gov',
            'email' => 'egov@gmail.com',
            'password' => Hash::make('123'),
            'role' => 'admin_egov',
        ]);
    }
}
