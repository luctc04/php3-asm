<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        
        DB::table('post_tag')->truncate();
        Post::query()->truncate();
        Tag::query()->truncate();

        Tag::factory(15)->create();
        
        for($i = 0; $i < 6; $i++){
            Post::query()->create([
                'category_id'=> rand(1, 4),
                'author_id'=> rand(1, 2),
                'title' => fake()->text('50'),
                'excerpt' => fake()->text('50'),
                'img_thumbnail' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS31qZj9VmsHL0-dTRbu_uAXHl5sD-vqVl7lg&s',
                'img_cover' => 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSh9EDwF1g7TqepRAVYJezAtbfNjV5OV9-MZA&s',
            ]);
        }

        for ($i = 1; $i < 6; $i++) {
            DB::table('post_tag')->insert([
                [
                    'post_id' => $i,
                    'tag_id' => rand(1, 8)
                ],
                [
                    'post_id' => $i,
                    'tag_id' => rand(9, 15)
                ]
            ]);
        }
    }
}
