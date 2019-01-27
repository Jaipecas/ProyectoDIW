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

        DB::table('games')->insertGetId([
            'language' => 'es',
            'state' => 'turn_p1',
            'player_1' => 1,
            'player_1_score' => 0,
            'player_1_letters' => 'D02L01N01r08O01H04U01',
            'player_2' => 2,
            'player_2_score' => 0,
            'player_2_letters' => 'E01R01C03A01I01H04I01',
            'remaining_letters' => 'OcTIDRDIUOECVLRAZEEIGIEEEANATnTMASOWEDOUFGNAASALl**DONAUNPUEAEBCJMSOASQRLSPCBRYETAOEOS',
            'tableboard' => '                                                                                                                                                                                                                                 '
        ]);
    }
}
