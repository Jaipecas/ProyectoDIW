<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {    
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

        // partida para jugarla
        DB::table('games')->insertGetId([
            'language' => 'es',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
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

        // partida para ganarla. Poner TOME en la D6 (forma TOMEN)
        DB::table('games')->insertGetId([
            'language' => 'es',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'state' => 'turn_p1',
            'player_1' => 1,
            'player_1_score' => 340,
            'player_1_letters' => 'T01O01M03E01',
            'player_2' => 2,
            'player_2_score' => 300,
            'player_2_letters' => 'B03N01C03R01S01',
            'remaining_letters' => '',
            'tableboard' => ' PIV*TES   JETALUNA  HILASE O              C          QUErA         F    R         R    O   R     I   EN  CAcINEROS  N   IDO     O  S   l P*    Y  U   A EX  GUATEE  ES D   U    Ñ BD     MAZA LODOAH     CALE   GDI     A      O'
            
        ]);
        
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
    }
}
