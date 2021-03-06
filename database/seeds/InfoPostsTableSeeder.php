<?php

use Illuminate\Database\Seeder;
use App\InfoPost;
use App\Post;
use Faker\Generator as Faker;

class InfoPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $posts = Post::all();

        foreach ($posts as $post) {
            $newInfoPost = new InfoPost();

            $newInfoPost->post_id = $post->id;
            $newInfoPost->stato_post = $faker->randomElement(['Pubblico', 'Privato','Bozza']);
            $newInfoPost->stato_commenti = $faker->randomElement(['Aperto', 'Privato','Chiuso']);

            $newInfoPost->save();
        }
    }
}
