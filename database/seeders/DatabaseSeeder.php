<?php

namespace Database\Seeders;

use \App\Models\Category;
use App\Models\Comment;
use \App\Models\Post;
use \App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $user = User::factory()->create([
            'name' => 'John Doe',
            'username' => 'Johgn Do'
            ]);

        $categories = Category::factory(15)->create();

        $posts = Post::factory()->count(30)->create([
            'user_id' => $user->id,
            'category_id' => fn() => $categories->shuffle()->first(),
        ]);

        $comments = Comment::factory(40)->create(
            [
                'post_id' => fn() => $posts->shuffle()->first(),
            ]
        );
    }
}
