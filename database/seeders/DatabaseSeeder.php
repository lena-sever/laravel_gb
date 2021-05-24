<?php

namespace Database\Seeders;

use App\Models\Source;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Source::factory(10)->create();

        $categories = Category::factory(5)
            ->has(News::factory(10)) // каждая категоряя имеет фабрику 10 новостей
            ->create();
    }
}
