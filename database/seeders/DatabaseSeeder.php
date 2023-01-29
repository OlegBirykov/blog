<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\Post;

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

        $user = User::factory()->create();

        $personal = Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        $family = Category::create([
            'name' => 'Family',
            'slug' => 'family',
        ]);

        $work = Category::create([
            'name' => 'Work',
            'slug' => 'work',
        ]);

        Post::create([
          'user_id' => $user->id,
          'category_id' => $family->id,
          'title' => 'My Family Post',
          'slug' => 'my-family-post',
          'excerpt' => '<p>Это пост о чём-то</p>',
          'body' => '<p>С точки зрения банальной эрудиции, мы не вправе игнорировать тенденции парадоксальных эмоций данного индивидуума, ибо его концепция при данных интерпретациях выглядит весьма логично</p>',
        ]);

        Post::create([
          'user_id' => $user->id,
          'category_id' => $work->id,
          'title' => 'My Work Post',
          'slug' => 'my-work-post',
          'excerpt' => '<p>Это пост о чём-то</p>',
          'body' => '<p>С точки зрения банальной эрудиции, мы не вправе игнорировать тенденции парадоксальных эмоций данного индивидуума, ибо его концепция при данных интерпретациях выглядит весьма логично</p>',
        ]);
    }
}
