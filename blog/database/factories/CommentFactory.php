<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $random_user = User::all()->random(1)->pluck('id');
        $random_post = Post::all()->random(1)->pluck('id');
        return [
            'user_id' => $random_user,
            'post_id' => $random_post,
            'message' => fake()->text(),
        ];
    }
}
