<?php

namespace Database\Seeders;

use App\Models\Discipline;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $userIds = array_column(User::all()->toArray(), 'id');
        $discIds = array_column(Discipline::all()->toArray(), 'id');

        for ($i = 0; $i < 15; $i++) {
            Project::factory(1)->create([
                'discipline_id' => $discIds[array_rand($discIds)],
                'user_id' => $userIds[array_rand($userIds)]
            ]);
        }
    }
}
