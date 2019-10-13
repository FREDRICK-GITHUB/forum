<?php

use Illuminate\Database\Seeder;

use App\Channel;
class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1= ['title' => 'Laravel 5.8'];
        $channel2= ['title' => 'Vue Js'];
        $channel3= ['title' => 'Bootstrap'];
        $channel4= ['title' => 'CSS'];
        $channel5= ['title' => 'Wordpress'];   
        
        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
    }
}
