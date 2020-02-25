<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new \App\User();
        $user->first_name = 'Andrew';
        $user->last_name = 'Bielecki';
        $user->email = 'ambielecki@gmail.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('Ch@ng3m3');
        $user->is_admin = 1;
        $user->save();

        $user = new \App\User();
        $user->first_name = 'Jill';
        $user->last_name = 'Bielecki';
        $user->email = 'testjill@test.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('Ch@ng3m3');
        $user->is_admin = 0;
        $user->save();

        $user = new \App\User();
        $user->first_name = 'Nathan';
        $user->last_name = 'Bielecki';
        $user->email = 'testnathan@test.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('Ch@ng3m3');
        $user->is_admin = 0;
        $user->save();
    }
}
