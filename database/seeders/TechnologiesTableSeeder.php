<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Technology;
use Illuminate\Support\Str;

class TechnologiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $tags = ['css', 'js', 'vue', 'sql', 'php', 'laravel'];
    
            foreach($tags as $tag) {
                $newTag = new Technology();
                $newTag->name = $tag;
                $newTag->slug = Str::slug($newTag->name, '-');
                $newTag->save();
            }
        }
    }
}
