<?php
use Illuminate\Database\Seeder;

class LanguageTableSeeder extends Seeder
{

public function run()
    {
        DB::table('languages')->delete();
        $langs = ['en', 'es'];

        foreach($langs as $lang){
            DB::table('languages')->insert([
                'lang' => $lang
            ]);
        }
    }
}