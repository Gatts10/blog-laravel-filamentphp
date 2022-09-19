<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Tag;
use App\Models\Post;
use App\Models\User;
use App\Models\Event;
use App\Models\Category;
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
        // \App\Models\User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'orlando.carvalho31@gmail.com',
        ]);

        User::factory()->create([
            'name' => 'Author 1',
            'email' => 'author1@mail.com',
        ]);

        User::factory()->create([
            'name' => 'Author 2',
            'email' => 'author2@mail.com',
        ]);

        Category::factory(10)->create();
        Event::factory(12)->create();

        $posts = Post::factory(18)->create();
        $tags = Tag::factory(10)->create();
        $posts->each(function (Post $posts) use ($tags) {
            $posts->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}