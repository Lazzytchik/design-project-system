<?php

namespace Database\Seeders;

use App\Models\Group;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $groups = Group::all();

        foreach ($groups as $group){
            User::factory(5)->create([
                'group_id' => $group->id,
            ]);
        }

    }
}
