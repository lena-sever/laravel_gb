<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\News;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ShowNewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_news_screen_can_be_rendered()
    {
        $category = Category::factory()->create();
        $news = News::factory()->create([
            'category_id' => $category->id
        ]);

        $news_id = $news->id;
        $response = $this->get("/news/$news_id");
        $response->assertStatus(200);
    }



}
