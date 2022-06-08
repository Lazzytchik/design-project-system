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

        /*foreach ($groups as $group){
            User::factory(5)->create([
                'group_id' => $group->id,
            ]);
        }*/

        User::factory(1)->create([
            'name' => 'Teacher',
            'username' => 'biaTeacher',
            'password' => '12345',
            'group_id' => Group::TEACHER,
        ]);

        User::factory(1)->create([
            'name' => 'Arseniy',
            'username' => 'Lazzytchik',
            'email' => 'romaniukae@gmail.com' ,
            'password' => '12345',
            'group_id' => Group::STUDENT,
        ]);

    }
}
