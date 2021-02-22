<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Generator as Faker;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 15; $i++) { 
            
            $newPost = new Post();

            $newPost->titolo = $faker->sentence(3);
            $newPost->slug = Str::slug($newPost->titolo);
            $newPost->testo = $faker->text(2000);
            $newPost->autore = $faker->name;
            $newPost->foto = $faker->imageUrl(640, 480, 'nature');
            $newPost->data_pubblicazione = $faker->dateTime
            ();
            $newPost->save();
        }
    }
}
