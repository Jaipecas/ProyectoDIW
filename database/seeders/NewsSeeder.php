<?php

namespace Database\Seeders;

use App\Models\News;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('news')->insert([
            'header' => 'V Torneo de Navidad ProgramaMe',
            'abstract' => 'Como todos los años en estas fechas ¡toca programar!. Inscripción abierta.',
            'url' => 'http://www.programa-me.com/2021/reg/navidad/',
            'type' => 'info',
            'expires_at' => '2021-6-20',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        \DB::table('news')->insert([
            'header' => 'Taller sobre Git Avanzado',
            'abstract' => 'El próximo mes de abril se desarrollará un nuevo taller, en este caso sobre el uso de avanzado de Git el estándar de facto del control de versiones.',
            'url' => 'https://git-scm.com/book/es/v2',
            'type' => 'info',
            'expires_at' => '2021-6-20',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        \DB::table('news')->insert([
            'header' => 'Abierto el plazo para renuncia de convocatoria',
            'abstract' => 'El plazo finalizará el próximo 31 de febrero a las 2:45 hora ZULU',
            'url' => 'https://tenor.com/view/run-forrest-puppet-panic-run-scream-gif-4888322',
            'type' => 'notice',
            'expires_at' => '2021-6-20',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        // creo 10 noticias aleatorioas
        News::factory()
            ->count(10)
            ->create();
    }
}
