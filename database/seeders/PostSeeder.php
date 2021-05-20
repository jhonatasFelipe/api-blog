<?php

use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $users */
        $users = \App\User::all();
        /** @var \Illuminate\Database\Eloquent\Collection $posts */
        $posts = factory(\App\Models\Post::class,8)->make();

        $posts->each(function($post)use($users){
            $post->author = $users->random()->id;
            $post->save();
        });


    }
}
