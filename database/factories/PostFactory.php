<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Post::class;

    public function definition()
    {
        $title = ucwords($this->faker->unique()->word);

        return [
            'category_id' => Category::all()->random()->id,
            'event_id' => $this->faker->optional()->randomElement(Event::all()->pluck('id')),
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => $this->faker->paragraph(3),
            'published_at' => $this->faker->dateTimeThisMonth(),
            'is_published' => $this->faker->boolean(50),
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Post $item) {
            $url = 'https://source.unsplash.com/1200x800/?nature,water';
            $item
                ->addMediaFromUrl($url)
                ->toMediaCollection('posts');
        });
    }
}
