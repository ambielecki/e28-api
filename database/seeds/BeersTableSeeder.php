<?php

use App\Beer;
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
        $faker = \Faker\Factory::create();

        foreach (Beer::STYLES as $style_id => $style_text) {
            $beer = new Beer();
            $beer->user_id = 1;
            $beer->name = "McTesterson $style_text";
            $beer->style = $style_id;
            $beer->recipe = $faker->paragraphs(3, true);
            $beer->brew_notes = [$faker->paragraphs(1, true), $faker->paragraphs(1, true), $faker->paragraphs(1, true)];
            $beer->primary_fermentation_start = $faker->dateTimeThisYear()->format('Y-m-d h:i');

            $beer->save();
        }
    }
}
