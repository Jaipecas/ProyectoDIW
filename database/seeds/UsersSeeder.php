<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id1 = DB::table('users')->insertGetId([
            'name' => 'user1',
            'email' => 'u1@c.com',
            'password' => bcrypt('12345'),
            'country' => 'ES',
            'favourite_language' => 'es'
        ]);

        $id2 = DB::table('users')->insertGetId([
            'name' => 'user2',
            'email' => 'u2@c.com',
            'password' => bcrypt('12345'),
            'country' => 'ES',
            'favourite_language' => 'es'
        ]);

        // creo notificaciones para los dos usuarios específicos
        factory(App\Notification::class, 7)
            ->make()
            ->each(function($n) use($id1) {
                User::find($id1)->notifications()->save($n);
            });

        factory(App\Notification::class, 3)
            ->make()
            ->each(function($n) use($id2) {
                User::find($id2)->notifications()->save($n);
            });

        // creo 20 usuarios aleatorios y los almacena en la BD y les asigna notificaciones
        factory(App\User::class, 20)
            ->create()
            ->each(function($u) {
                // para no asignarles a todos notificaciones
                // si tendiense a infinito, un 40% de las veces se añadirían notificaciones
                if (mt_rand(1, 100) >= 60) {
                    // creo entre 1 y 3 notificaciones
                    factory(App\Notification::class, mt_rand(1, 3))
                        ->make()
                        ->each(function($n) use($u) {
                            $u->notifications()->save($n);
                        });
                }
            });

        // creo 2 usuarios desactivados
        factory(App\User::class, 2)->states('disable')->create();

        // creo un administrador (podría crear un state, pero, por variar, 
        // lo hago sobreescribiendo el valor de type)
        factory(App\User::class)->create([
            'type' => 'admin',
        ]);
    }
}
