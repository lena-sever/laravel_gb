<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use App\Models\Source;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowNewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_news_screen_can_be_rendered()
    {
       // $this->withoutExceptionHandling();

        $category = Category::factory()->create();
        $source = Source::factory()->create(); // создаём источник
        $news = News::factory()->create([
            'category_id' => $category->id,
            'source_id' => $source->id
        ]);

        $news_id = $news->id;
        $response = $this->get("/news/$news_id");
        $response->assertStatus(200);
    }



}
