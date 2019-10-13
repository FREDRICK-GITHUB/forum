<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Reply::create([
            'user_id' => '1',
            'discussion_id' => '1',
            'content' => 'Not yet ready for it'
        ]);

        App\Reply::create([
            'user_id' => '2',
            'discussion_id' => '2',
            'content' => 'The logs have no change at all'
        ]);

        App\Reply::create([
            'user_id' => '1',
            'discussion_id' => '3',
            'content' => 'Very beginer friendly'
        ]);

        App\Reply::create([
            'user_id' => '2',
            'discussion_id' => '4',
            'content' => 'This is  awesome for UI'
        ]);
    }
}
