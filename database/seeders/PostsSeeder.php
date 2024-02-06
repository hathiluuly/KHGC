<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory(5)->create(); 
        
        Post::create([
            'user_id' => 2,
            'thumbnail' => 'path/to/thumbnail.jpg',
            'title' => 'Tiêu đề bài viết 1',
            'content' =>'hsajhsaja',
            'description' => 'Nội dung mô tả cho bài viết 1.',
            'status' => '0',
        ]);

        Post::create([
            'user_id' => 2,
            'thumbnail' => 'path/to/another-thumbnail.jpg',
            'title' => 'Tiêu đề bài viết 2',
            'content' =>'hsajhsaja',
            'description' => 'Nội dung mô tả cho bài viết 2.',
            'status' => '0',
        ]);

    }
}
