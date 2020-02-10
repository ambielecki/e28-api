<?php

use Illuminate\Database\Seeder;

class BeersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $beer = new \App\Beer();
        $beer->user_id = 1;
        $beer->name('McTesterson IPA');

    }
}
