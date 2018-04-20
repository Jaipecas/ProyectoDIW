<?php

use Illuminate\Database\Seeder;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // creo entre 3 y 40 partidas
        factory(App\Game::class, mt_rand(3,40))
            ->create()
            ->each(function($g) {
                $id1 = App\User::find(mt_rand(1,20));
                $g->player1()->associate($id1)->save();

                do {
                    $id2 = App\User::find(mt_rand(1,20));
                } while ($id1 == $id2);

                $g->player2()->associate($id2)->save();
            });

        // creo 5 partidas entre los jugadores específicos
        factory(App\Game::class, 5)
            ->create()
            ->each(function($g) {
                $id1 = App\User::find(1);
                $id2 = App\User::find(2);
                if (mt_rand(1, 100) >= 50) {
                    $tmp = $id2; $id2 = $id1; $id1 = $tmp; 
                }
                $g->player1()->associate($id1)->save();
                $g->player2()->associate($id2)->save();

                if ($g->state != 'win_p1' && $g->state != 'win_p2') {
                    if (mt_rand(1, 100) >= 50) 
                        $g->state == 'win_p1';
                    else
                        $g->state == 'win_p2';
                }
            });
    }
}
