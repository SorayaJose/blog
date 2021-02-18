<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\Post;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	Storage::deleteDirectory('posts');
    	Storage::makeDirectory('posts');
        $posts = Post::factory(300)->create();
        foreach ($posts as $post) {
        	Image::factory(1)->create([
        		'imageable_id'=> $post->id,
        		'imageable_type'=> Post::class,
        	]);
        	$post->tags()->attach([
        		random_int(1, 4),
        		random_int(5, 8)
        	]);
        }

    }
}
