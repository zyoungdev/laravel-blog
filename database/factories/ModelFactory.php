<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

// $factory->define(App\User::class, function (Faker\Generator $faker) {
//   return [
//     'name' => $faker->name,
//     'email' => $faker->email,
//     'password' => bcrypt(str_random(10)),
//     'remember_token' => str_random(10),
//   ];
// });

$factory->define(App\Article::class, function(Faker\Generator $faker) {
  $title      = $faker->sentence;
  $thumbnails = App\Multimed::where('image_use_type', 'thumbnail')->pluck('id')->toArray();
  $headers    = App\Multimed::where('image_use_type', 'header')->pluck('id')->toArray();

  shuffle($thumbnails);
  shuffle($headers);

  return [
    'title'           => $title,
    'uri'             => strtolower(str_replace(' ', '-', preg_replace("/[^a-zA-Z 0-9]+/", "", $title))),
    'meta_desc'       => $faker->sentence,
    'keywords'        => $faker->sentence,
    'thumbnail_image' => $thumbnails[0],
    'header_image'    => $headers[0],
    'published_at'    => $faker->date(),
    'is_public'       => $faker->boolean(),
    'body'            => $faker->paragraph(10, true),

  ];
});

$factory->define(App\Multimed::class, function(Faker\Generator $faker) {
  $title       = $faker->words(3, true);
  $safetitle   = strtolower(str_replace(' ', '-', $title));

  $imagetype   = ['thumbnail', 'header', 'general'];
  $imagefolder = ['/res/fileUplaods/images/thumbnail', '/res/fileUplaods/images/header', '/res/fileUplaods/images/general'];
  $rand        = $faker->numberBetween(0,2);

  return [
    'title'          => $title,
    'alt'            => $title,
    'attr'           => $faker->name,
    'attr_link'      => 'https://creativecommons.org/licenses/by/4.0/',
    'license'        => 'CC BY 4.0',
    'license_link'   => 'https://creativecommons.org/licenses/by/4.0/',
    'image_use_type' => $imagetype[$rand],
    'folder'         => $imagefolder[$rand],
    'safename'       => $safetitle,
    'filename'       => $safetitle . '.jpg',
    'filetype'       => 'image/jpg',
    'extension'      => 'jpg',
    'filesize'       => '10000'

  ];
});
