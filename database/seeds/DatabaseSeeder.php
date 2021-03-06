<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(GalleriesSeeder::class);
        $this->call(ImagesSeeder::class);
        $this->call(CommentsSeeder::class);
    }
}
