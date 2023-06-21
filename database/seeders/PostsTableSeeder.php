<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $Faker)
    {
        for ($i=0; $i < 20 ; $i++) {

          $new_post = new Post();
          $new_post->title = $Faker->sentence();
          $new_post->slug = Post::generateSlug($new_post->title);
          $new_post->text = $Faker->text(300);
          $new_post->date = date('y-m-d');
          // dump($new_post);
          $new_post->save();
        }
    }
}
