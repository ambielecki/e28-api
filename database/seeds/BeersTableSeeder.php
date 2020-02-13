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

        $beer = new Beer();
        $beer->user_id = 1;
        $beer->name = 'McTesterson Stout';
        $beer->style = Beer::STYLE_STOUT;
        $beer->recipe = $faker->paragraphs(3, true);
        $beer->brew_notes = $faker->paragraphs(3, true);
        $beer->primary_fermentation_start = '2020-02-14 13:45';

        $beer->save();

        $beer = new Beer();
        $beer->user_id = 1;
        $beer->name = 'McTesterson IPA';
        $beer->style = Beer::STYLE_IPA;
        $beer->recipe = $faker->paragraphs(3, true);
        $beer->brew_notes = $faker->paragraphs(3, true);
        $beer->primary_fermentation_start = '2020-02-14 13:45';

        $beer->save();

        $beer = new Beer();
        $beer->user_id = 1;
        $beer->name = 'McTesterson Pale Ale';
        $beer->style = Beer::STYLE_PALE_ALE;
        $beer->recipe = $faker->paragraphs(3, true);
        $beer->brew_notes = $faker->paragraphs(3, true);
        $beer->primary_fermentation_start = '2020-02-14 13:45';

        $beer->save();

        $beer = new Beer();
        $beer->user_id = 1;
        $beer->name = 'McTesterson Brown Ale';
        $beer->style = Beer::STYLE_BROWN_ALE;
        $beer->recipe = $faker->paragraphs(3, true);
        $beer->brew_notes = $faker->paragraphs(3, true);
        $beer->primary_fermentation_start = '2020-02-14 13:45';

        $beer->save();
    }
}
