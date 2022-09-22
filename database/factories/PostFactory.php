<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
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
        $title = ucwords(fake()->unique()->word);

        return [
            'category_id' => Category::all()->random()->id,
            'event_id' => fake()->optional()->randomElement(Event::all()->pluck('id')),
            'user_id' => User::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'content' => fake()->paragraph(10),
            'published_at' => fake()->unique()->dateTimeThisYear(),
            'is_published' => fake()->boolean(50),
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
