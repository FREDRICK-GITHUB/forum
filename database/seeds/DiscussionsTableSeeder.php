<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Laravel fundamentals';
        $t2 = 'Vue JS fundamentals';
        $t3 = 'Bootstrap fundamentals';
        $t4 = 'Aouth fundamentals';
        $t5 = 'Wordpress fundamentals';

        App\Discussion::create([
            'title' => $t1,
            'slug' => str_slug($t1),
            'content' => 'Quick introduction to Laravel',
            'user_id' => '1',
            'channel_id' => '1'        
        ]);

        App\Discussion::create([     
            'title' => $t2,
            'slug' => str_slug($t2),
            'content' => 'Vue for web front end',
            'user_id' => '1',
            'channel_id' => '2'        
        ]);

        App\Discussion::create([ 
            'title' => $t3,
            'slug' => str_slug($t3),
            'content' => 'Modern day styling',
            'user_id' => '1',
            'channel_id' => '3'        
        ]);

        App\Discussion::create([ 
            'title' => $t4,
            'slug' => str_slug($t4),
            'content' => 'Introduction to Laravel authentication',
            'user_id' => '2',
            'channel_id' => '4'        
        ]);
    }
}
