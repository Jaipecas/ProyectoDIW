<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class SupportedLanguagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('supported_languages')->insert([
            'name' => 'Español',
            'language' => 'es',
        ]);

        \DB::table('supported_languages')->insert([
            'name' => 'English',
            'language' => 'en',
        ]);
    }
}
