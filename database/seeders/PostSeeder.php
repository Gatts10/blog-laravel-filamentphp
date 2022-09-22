<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::factory(18)->create();
        $tags = Tag::factory(10)->create();
        $posts->each(function (Post $posts) use ($tags) {
            $posts->tags()->attach(
                $tags->random(rand(1, 3))->pluck('id')->toArray()
            );
        });
    }
}
