<?php

use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    App\User::create([
      'name'     => 'admin',
      'email'    => 'admin@zerovector.space',
      'password' => bcrypt('password'),
      'is_admin' => true
    ]);
  }
}
