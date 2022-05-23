<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run(): void
    {
        $this->call([
            DisciplineSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            ProjectSeeder::class
        ]);
    }
}
