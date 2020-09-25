<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Notification;
use App\Models\Challenge;
use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id1 = \DB::table('users')->insertGetId([
            'name' => 'user1',
            'email' => 'u1@c.com',
            'password' => bcrypt('12345'),
            'country' => 'ES',
            'favourite_language' => 'es'
        ]);

        $id2 = \DB::table('users')->insertGetId([
            'name' => 'user2',
            'email' => 'u2@c.com',
            'password' => bcrypt('12345'),
            'country' => 'ES',
            'favourite_language' => 'es'
        ]);

        // creo notificaciones para los dos usuarios específicos
        Notification::factory()
            ->count(7)
            ->make()
            ->each(function($n) use($id1) {
                User::find($id1)->notifications()->save($n);
            });
        
        Notification::factory()
            ->count(3)
            ->make()
            ->each(function($n) use($id2) {
                User::find($id2)->notifications()->save($n);
            });

        // creo niveles para los dos usuarios específicos
        User::find($id1)->languages()->sync(['es' => $this->randomLevel(), 'en' => $this->randomLevel()]);
        User::find($id2)->languages()->sync(['es' => $this->randomLevel(), 'en' => $this->randomLevel()]);
    
        // creo 20 usuarios aleatorios y los almacena en la BD y les asigna notificaciones
        User::factory()
            ->count(20)
            ->create()
            ->each(function($u) {
                // para no asignarles a todos notificaciones
                // si tendiense a infinito, un 40% de las veces se añadirían notificaciones
                if (mt_rand(1, 100) >= 60) {
                    // creo entre 1 y 3 notificaciones
                    Notification::factory()
                        ->count(mt_rand(1, 3))
                        ->make()
                        ->each(function($n) use($u) {
                            $u->notifications()->save($n);
                        });
                }

                // a un 30% les creo retos
                if (mt_rand(1, 100) <= 30) {
                    // creo entre 1 y 2 retos. Los creo por nivel
                    \App\Models\Challenge::factory()
                        ->count(mt_rand(1, 2))
                        ->make()
                        ->each(function($c) use($u) {
                            $u->requestChallenges()->save($c);
                        });
                    }

                $u->languages()->sync(['es' => $this->randomLevel(), 'en' => $this->randomLevel()]);
            });

        // creo 2 usuarios desactivados
        User::factory()
            ->count(2)
            ->disabled()
            ->create()
            ->each(function($u) {
                $u->languages()->sync(['es' => $this->randomLevel(), 'en' => $this->randomLevel()]);
            });

        // creo un administrador (podría crear un state, pero, por variar, 
        // lo hago sobreescribiendo el valor de type)
        User::factory()->create([
            'type' => 'admin',
        ]);

        // creo retos para los usuarios específicos
        // contra otra jugador
        $c1 = Challenge::factory()->againstUser()->make();
        User::find($id1)->requestChallenges()->save($c1);      

        $c2 = Challenge::factory()->make();
        User::find($id2)->requestChallenges()->save($c2);

        // creo retos de nivel cero
        $c1 = \App\Models\Challenge::factory()->level0()->make();
        User::find($id1)->requestChallenges()->save($c1);      

        $c2 = \App\Models\Challenge::factory()->level0()->make();
        User::find($id2)->requestChallenges()->save($c2);

    }

    private function randomLevel() {
        $won = mt_rand(1, 100);
        $lost = mt_rand(1, 100);
        $played = $won + $lost;

        if ($played == 0) 
            $level = 1;
        else 
            $level = round(($won * 4 / $played) + 1, 0, PHP_ROUND_HALF_DOWN);

        return ['level' => $level, 'won' => $won, 'lost' => $lost];
    }
}
