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
        $user->password = \Illuminate\Support\Facades\Hash::make(config('app.default_password'));
        $user->is_admin = 1;
        $user->save();

        $user = new \App\User();
        $user->first_name = 'Testy';
        $user->last_name = 'McTersterson';
        $user->email = 'testy@test.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('foobarfizzbuzz');
        $user->is_admin = 0;
        $user->save();

        $user = new \App\User();
        $user->first_name = 'Automation';
        $user->last_name = 'User';
        $user->email = 'automation@test.com';
        $user->password = \Illuminate\Support\Facades\Hash::make('1&heatwave_penguin_monstertruck');
        $user->is_admin = 0;
        $user->save();
    }
}
