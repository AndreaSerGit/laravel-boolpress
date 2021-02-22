<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags = [
            'estate',
            'inverno',
            '2020',
            '2021',
            'covid',
            'animali'
        ];

        foreach ($tags as $tag) {
            
            $newTag = New Tag();
            $newTag->name = $tag;
            $newTag->slug = Str::slug($tag);

            $newTag->save();
        }
    }
}
