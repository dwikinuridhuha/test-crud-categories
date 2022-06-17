<?php
namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Category;

class PostTest extends TestCase
{
    public function test_bisa_bikin_post(){
        $data = [
            'name' => $this->faker->text,
            'is_publish' => $this->faker->boolean,
        ];
        $this->post(route('api/categories'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }

    public function test_bisa_update_post(){
        $post = factory(Category::class)->create();
        $data = [
            'title' => $this->faker->sentence,
            'content' => $this->faker->paragraph
        ];
        $this->put(route('categories.update', $post->id), $data)
            ->assertStatus(200)
            ->assertJson($data);
    }

    public function test_bisa_show_post(){
        $post = factory(Category::class)->create();
        $this->get(route('categories.show', $post->id))
            ->assertStatus(200);
    }


    public function test_bisa_delete_post(){
        $post = factory(Category::class)->create();
        $this->delete(route('categories.delete', $post->id))
            ->assertStatus(204);
    }

    public function test_bisa_tampilkan_list_posts(){
        $posts = factory(Category::class, 2)->create()->map(function ($post) {
            return $post->only(['id', 'title', 'content']);
        });
        $this->get(route('categories'))
            ->assertStatus(200)
            ->assertJson($posts->toArray())
            ->assertJsonStructure([
                '*' => [ 'name', 'is_publish'],
            ]);
    }
}
