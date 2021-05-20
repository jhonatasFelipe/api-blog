<?php

use Illuminate\Database\Seeder;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $posts */
        $posts = \App\Models\Post::all();
        /** @var Illuminate\Database\Eloquent\Collection $tags */
        $tags = \App\Models\Tag::all();

        $posts->each(function($post) use($tags){
            $post->tags()->attach($tags->random()->id);
        });

    }
}
