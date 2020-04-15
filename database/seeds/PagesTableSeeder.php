<?php

use App\Page;
use Illuminate\Database\Seeder;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $page = new Page();
        $page->app = Page::APP_BEER;
        $page->page = Page::PAGE_TYPE_HOME;
        $page->content = <<<TEXT
<p>Homebrew Helper is a simple proof of concept application that allows a users to save and rate 
their homebrew recipes.  The journal tab will show a list of previous brews, with some of their 
vital stats, so you can simply find your favorites and recreate them (or just reminisce a little);
</p>
<p>
One can also find a work in progress collection of helpful tools under, you guessed it, the tools 
link. Currently limited to just an ABV calculator, but more will be added (time and interest 
permitting).
</p>
<p>
I am a novice at the homebrew game and felt this would be the perfect way to help me track my journey. 
Surely there are fields missing, and the filtering and searching is definitely primitive at the moment. 
But now is definitely the time for time for hobbies, whether it is making sure you are supplied with 
homebrew.
</p>
<p>
On the technical side, this site is also an experiment (for class), written as a full Single Page 
Application using Vue.js.  The site is backed by a Laravel API and hosted on Digital Ocean.
</p>
<p>
Whether it is coding or homebrew, now is a great time to start and track a new hobby!
</p>
TEXT;
        $page->save();
    }
}
