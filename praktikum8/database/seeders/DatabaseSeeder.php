<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            MajorSeeder::class,
            SubjectSeeder::class,
            StudentSeeder::class,
        ]);

    }
 }

    
