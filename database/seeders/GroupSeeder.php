<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = new Group();
        $group->name = 'Преподаватели';
        $group->code = 'teachers';
        $group->save();

        $group = new Group();
        $group->name = 'Студенты';
        $group->code = 'students';
        $group->save();
    }
}
