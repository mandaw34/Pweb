<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            [
                'nim' => '2411533009',
                'nama' => 'Devina Amanda Putri',
                'jurusan' => 'Informatika',
                'angkatan' => 2024,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2211533314',
                'nama' => 'Jung Jaehyun',
                'jurusan' => 'Informatika',
                'angkatan' => 2022,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nim' => '2311533323',
                'nama' => 'Lee Jeno',
                'jurusan' => 'Informatika',
                'angkatan' => 2023,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

}
