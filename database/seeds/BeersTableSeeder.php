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
            $beer->user_id = 2;
            $beer->name = "McTesterson $style_text";
            $beer->style = $style_id;
            $beer->is_public = random_int(0, 1);
            $beer->recipe = $faker->paragraphs(3, true);
            $beer->brew_notes = $faker->paragraphs(3, true);
            $beer->rating = random_int(1, 5);
            $beer->primary_fermentation_start = $faker->dateTimeThisYear()->format('Y-m-d h:i');

            $beer->save();
        }

        foreach (Beer::STYLES as $style_id => $style_text) {
            $beer = new Beer();
            $beer->user_id = 2;
            $beer->name = "Testy $style_text";
            $beer->style = $style_id;
            $beer->is_public = random_int(0, 1);
            $beer->recipe = $faker->paragraphs(3, true);
            $beer->brew_notes = $faker->paragraphs(3, true);
            $beer->primary_fermentation_start = $faker->dateTimeThisYear()->format('Y-m-d h:i');
            $beer->rating = random_int(1, 5);
            $beer->save();
        }
    }
}
