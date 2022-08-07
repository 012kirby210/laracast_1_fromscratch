<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
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
        User::truncate();
        Category::truncate();
        Post::truncate();


        $user = \App\Models\User::factory()->create();

//        \App\Models\User::factory(10)->create();
        $personal_category = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);
        $work_category = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);
        $family_category = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $family_category->id,
            'title' => 'My Family post',
            'slug' => 'my-family-post',
            'excerpt' => 'The family post excerpt',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus volutpat sem, nec finibus lacus sodales non. Quisque urna velit, tristique ac ullamcorper non, suscipit non mi. Praesent dictum in urna non venenatis. Nunc congue lorem dictum lacus fringilla, non mattis urna bibendum. Donec feugiat sagittis elit, vel tincidunt orci ornare et. Suspendisse tempus est ut elit molestie aliquet. Nullam gravida malesuada est, a ultrices ipsum ullamcorper vel. Maecenas tristique a ante ac vulputate. Nunc malesuada nisi eu nibh auctor vehicula. Donec non urna euismod, convallis mi sit amet, tempus sem. Vestibulum vel aliquam felis. Maecenas sit amet pellentesque felis, non maximus ante. Phasellus maximus turpis nec faucibus efficitur. Maecenas cursus viverra sem id ultrices. Aenean et convallis quam, vitae ultrices augue. </p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $personal_category->id,
            'title' => 'My personal post',
            'slug' => 'my-personal-post',
            'excerpt' => 'The personal post excerpt',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus volutpat sem, nec finibus lacus sodales non. Quisque urna velit, tristique ac ullamcorper non, suscipit non mi. Praesent dictum in urna non venenatis. Nunc congue lorem dictum lacus fringilla, non mattis urna bibendum. Donec feugiat sagittis elit, vel tincidunt orci ornare et. Suspendisse tempus est ut elit molestie aliquet. Nullam gravida malesuada est, a ultrices ipsum ullamcorper vel. Maecenas tristique a ante ac vulputate. Nunc malesuada nisi eu nibh auctor vehicula. Donec non urna euismod, convallis mi sit amet, tempus sem. Vestibulum vel aliquam felis. Maecenas sit amet pellentesque felis, non maximus ante. Phasellus maximus turpis nec faucibus efficitur. Maecenas cursus viverra sem id ultrices. Aenean et convallis quam, vitae ultrices augue. </p>',
        ]);

        Post::create([
            'user_id' => $user->id,
            'category_id' => $work_category->id,
            'title' => 'My work post',
            'slug' => 'my-work-post',
            'excerpt' => 'The work post excerpt',
            'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus volutpat sem, nec finibus lacus sodales non. Quisque urna velit, tristique ac ullamcorper non, suscipit non mi. Praesent dictum in urna non venenatis. Nunc congue lorem dictum lacus fringilla, non mattis urna bibendum. Donec feugiat sagittis elit, vel tincidunt orci ornare et. Suspendisse tempus est ut elit molestie aliquet. Nullam gravida malesuada est, a ultrices ipsum ullamcorper vel. Maecenas tristique a ante ac vulputate. Nunc malesuada nisi eu nibh auctor vehicula. Donec non urna euismod, convallis mi sit amet, tempus sem. Vestibulum vel aliquam felis. Maecenas sit amet pellentesque felis, non maximus ante. Phasellus maximus turpis nec faucibus efficitur. Maecenas cursus viverra sem id ultrices. Aenean et convallis quam, vitae ultrices augue. </p>',
        ]);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
