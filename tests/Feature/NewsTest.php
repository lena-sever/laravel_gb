<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_screen_can_be_rendered()
    {
        $response = $this->get('/news');
        $response->assertStatus(200);
    }

    public function test_get_all_news()
    {
        $response = $this->seed(DatabaseSeeder::class); // засидим новости
        $response->assertDatabaseCount('news',50); //  таблица news содержит 50 записей:
    }





}
