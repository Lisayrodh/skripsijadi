<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Seeder;
use App\Models\Admin;
use App\Models\Doctor;

class DoctorsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = Admin::first();

        if ($admin) {
            $adminId = $admin->id_admin;

            // Membuat 25 dokter menggunakan factory
            Doctor::factory()->count(25)->create([
                'id_admin' => $adminId,
            ]);
        } else {
            // Anda bisa menambahkan logika untuk menangani kasus jika tidak ada admin di database
            echo "Tidak ada admin ditemukan di database.\n";
        }
}
}
