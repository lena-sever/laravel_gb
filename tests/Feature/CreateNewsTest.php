<?php

namespace Tests\Feature;

use App\Models\Source;
use App\Models\User;
use App\Models\Category;
use App\Models\News;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateNewsTest extends TestCase
{
    use RefreshDatabase;

    public function test_news_create_screen_can_be_rendered()
    {
        $response = $this->get('/news/create');

        $response->assertStatus(200);
    }

    public function test_create_news_success()
    {
        $this->withoutExceptionHandling();
        $category = Category::factory()->create(); // создаём категорию
        $source = Source::factory()->create(); // создаём источник

        $newsData = [
            'title' => 'This is title',
            'description' => 'This is description',
            'category_id' => $category->id,
            'source_id' => $source->id,
        ]; // данные тестовой новости

        $response = $this->post('/news/create', $newsData); // создаём новость

        $this->assertDatabaseHas('news', $newsData); // проверяет, что данные существуют в БД

        $response->assertStatus(302); // идёт редирект
        $response->assertRedirect('/news'); // редирект на страницу /news
        $response->assertSessionHasNoErrors(); // в сессии нет ошибок валидации
    }

    public function test_invalid_form_without_title()
    {
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'description' => 'This is description',
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_invalid_form_with_too_long_title()
    {
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'sadgasdsadgasdgasdgasdgasdgasdgasdgsadgasdgasdgasdgasdgasdgasdgsadgasdgasdgasdgasdgasdgasdgsadgasdgasdgasdgasdgasdgasdgsadgasdgasdgasdgasdgasdgasdgsadgasdgasdgasdgasdgasdgasdgsadgasdgasdgasdgasdgasdgasdggasdgasdgasdgasdgasdg',
            'description' => 'This is description',
            'category_id' => $category->id,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['title']);
    }

    public function test_invalid_form_without_description()
    {
        $category = Category::factory()->create();

        $response = $this->post('/news/create', [
            'title' => 'This is title',
            'category_id' => $category->id,]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['description']);
    }
}
