<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        #\App\Models\User::factory(10)->create();
        \App\Models\ArticleTag::factory(8)->create();
        \App\Models\articles::factory(20)->create();
        \App\Models\articles_tags::factory(35)->create();
        \App\Models\views::factory(500)->create();
    }
}
