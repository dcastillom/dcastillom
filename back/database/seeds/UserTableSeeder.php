<?php
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{

// php artisan db:seed
  
public function run()
    {
        DB::table('users')->insert([
            'name' => 'Daniel Castillo',
            'email' => 'danielcastillomarfull@gmail.com',
            'password' => bcrypt('nayade'),
        ]);
    }

}