<?php

use Illuminate\Database\Seeder;

class GroupsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\Group();
        $user->name = 'All';
        $user->options = json_encode([]);
        $user->save();
    }
}
