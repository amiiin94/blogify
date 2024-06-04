<?php

namespace Database\Seeders;

use App\Models\Post;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Muhammad Al Amin',
            'username' => 'amin',
            'email' => 'amin942004@gmail.com',
            'password' => bcrypt('amin942004')
        ]);

        User::factory(3)->create();
    

        Category::create([
            'name' => 'Photography',
            'slug' => 'photography'
        ]);

        Category::create([
            'name' => 'Videography',
            'slug' => 'videography'
        ]);

        Post::factory(20)->create();
    }
}
