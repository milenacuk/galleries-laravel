<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'image_url' => $faker->imageUrl($width = 640, $height = 480, 'abstract'),
        'gallery_id' => App\Gallery::all()->random()->id
        
    ];
});
