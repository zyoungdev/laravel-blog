<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    App\Tag::create([
      'name' => "Personal"
    ]);
    App\Tag::create([
      'name' => "Misc"
    ]);
    App\Tag::create([
      'name' => "Programming"
    ]);
    App\Tag::create([
      'name' => "C++"
    ]);
    App\Tag::create([
      'name' => "Linux"
    ]);
    App\Tag::create([
      'name' => "Music"
    ]);
  }
}
