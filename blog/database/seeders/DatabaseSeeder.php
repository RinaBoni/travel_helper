<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{


    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(50)->create();
        Comment::factory(100)->create();
        $posts = Post::all();
        $user_random_1 = $users->random(10);
        $user_random_2 = $users->random(30);
        $user_random_3 = $users->random(25);
        $posts_random_1 = $posts->random(10);
        $posts_random_2 = $posts->random(30);
        $posts_random_3 = $posts->random(25);
        foreach ($user_random_1 as $user){
            foreach($posts_random_1 as $post){
                $user->likedPosts()->toggle($post->id);
            }
        }
        foreach ($user_random_2 as $user){
            foreach($posts_random_2 as $post){
                $user->likedPosts()->toggle($post->id);
            }
        }
        foreach ($user_random_3 as $user){
            foreach($posts_random_3 as $post){
                $user->likedPosts()->toggle($post->id);
            }
        }

        // \App\Models\User::factory(100)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
