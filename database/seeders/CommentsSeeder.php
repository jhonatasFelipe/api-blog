<?php

use Illuminate\Database\Seeder;

class CommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /** @var \Illuminate\Database\Eloquent\Collection $comments */
        $comments  = factory(\App\Models\Comment::class,80)->make();

        $posts = \App\Models\Post::all();


        $comments->each(function($comment)use($posts){
            for($i = 0; $i < 10; $i++){
                $comment->post = $posts->random()->id;
                $comment->save();
            }
        });
    }
}
