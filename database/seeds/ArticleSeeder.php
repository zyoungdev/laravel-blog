<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(App\Article::class, 50)->create()->each(function($a) {
        $numbers = range(1,6);
        shuffle($numbers);

        // $thumbnails = App\Multimed::where('image_use_type', 'thumbnail')->lists('id')->toArray();
        // $headers = App\Multimed::where('image_use_type', 'header')->lists('id')->toArray();

        $a->images()->sync([$a['thumbnail_image'], $a['header_image']]);

        $a->tags()->sync(array_slice($numbers, 0, 3));
    });
  }
}
